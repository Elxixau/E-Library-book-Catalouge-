<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\User;
use App\Models\Visitor;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {  
        $user = Auth::user();
        $jumlahBuku = Buku::count();
        $jumlahAnggota = User::count();
        $monthlyVisitors = Visitor::monthlyVisitors();
        $yearlyVisitors = Visitor::yearlyVisitors();

        return view('dashboard/main', [
            'user'=> $user,
            'jumlahBuku' => $jumlahBuku,
            'jumlahAnggota' => $jumlahAnggota,
            'monthlyVisitors' => $monthlyVisitors,
            'yearlyVisitors' => $yearlyVisitors
        ]);
    
    }

    function buku()
    {   
        $buku = Buku::all(); 
        return view('dashboard/buku/buku', compact('buku')); 
    }

    function anggota()
    {   
       
        $anggota = User::all();
        return view('dashboard/anggota/anggota', compact('anggota'));
    }

    public function cetakPDF()
    {
        $anggota = User::all();

        $pdf = PDF::loadView('pdf.anggota', compact('anggota'));
        return $pdf->download('anggota.pdf');
    }

    function filter(Request $request)
    {
        $searchTerm = $request->input('search');

        $anggota = User::where('username', 'LIKE', "%$searchTerm%")
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('jabatan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->paginate(10); // Sesuaikan jumlah data yang ingin ditampilkan per halaman

        return view('dashboard/anggota/anggota', compact('anggota', 'searchTerm'));
    }
    
    public function editAnggota($id)
    {   
        $anggota = User::find($id);
        return view('dashboard/anggota/edit', compact('anggota'));
    }
    
    public function updateAnggota(Request $request, $id)
    {
        // Validasi data jika diperlukan
    
        $anggota = User::find($id);
        $anggota->username = $request->input('username');
        $anggota->name = $request->input('name');
        $anggota->jabatan = $request->input('jabatan');
        $anggota->email = $request->input('email');
        // Tambahkan logika lainnya sesuai kebutuhan
    
        $anggota->save();
    
        return redirect()->route('anggota')->with('success', 'Anggota berhasil diupdate!');
    }

    public function deleteAnggota($id)
    {
        
        $anggota = User::find($id);

        
        $anggota->delete();

        return redirect()->route('anggota')->with('success', 'Anggota berhasil dihapus.');
    }

    function profil()
    {
        $user = Auth::user();
        return view('dashboard/profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            // tambahkan validasi untuk field lainnya
        ]);

        $data = [
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'jabatan' => $request->input('jabatan'),
            'email' => $request->input('email'),
            // tambahkan field lainnya
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui.');
    }

}
