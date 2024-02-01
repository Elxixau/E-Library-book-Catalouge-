<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Tanggal saat ini
        $currentDate = Carbon::now();
        
        $currentUrl = $request->getRequestUri();

        // Daftar halaman yang ingin Anda hitung pengunjungnya
        $trackedPages = [
            '/',
            // Tambahkan halaman-halaman lain yang ingin Anda hitung di sini
        ];

        // Memeriksa apakah URL adalah /admin atau memiliki awalan /admin/
        if (strpos($currentUrl, '/admin') === 0) {
            // Jika URL adalah /admin atau memiliki awalan /admin/,
            // maka tidak perlu mencatat pengunjung
        } else {
            // Jika bukan halaman admin dan halaman terdaftar dalam trackedPages, cek apakah alamat IP telah tercatat sebelumnya
            if (in_array($currentUrl, $trackedPages)) {
                // Periksa terlebih dahulu apakah pengunjung sudah tercatat pada bulan ini
                $existingVisitorMonthly = Visitor::where('ip_address', $request->ip())
                    ->whereMonth('created_at', '=', $currentDate->month)
                    ->whereYear('created_at', '=', $currentDate->year)
                    ->first();

                if (!$existingVisitorMonthly) {
                    // Jika tidak ada pengunjung dengan alamat IP yang sama untuk bulan ini,
                    // catat pengunjung dengan tanggal pencatatan yang sesuai
                    Visitor::create([
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'visit_date' => $currentDate,
                    ]);
                }

                // Periksa apakah pengunjung sudah tercatat pada tahun ini
                $existingVisitorYearly = Visitor::where('ip_address', $request->ip())
                    ->whereYear('created_at', '=', $currentDate->year)
                    ->first();

                if (!$existingVisitorYearly) {
                    // Jika tidak ada pengunjung dengan alamat IP yang sama untuk tahun ini,
                    // catat pengunjung dengan tanggal pencatatan yang sesuai
                    Visitor::create([
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                        'visit_date' => $currentDate,
                    ]);
                }
            }
        }

        return $next($request);
    }
}
