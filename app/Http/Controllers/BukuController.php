<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use PDF;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{   
    public function cetakPDF()
    {
        $buku = Buku::all();

        $pdf = PDF::loadView('pdf.buku', compact('buku'))->setPaper('landscape');

        return $pdf->download('buku.pdf');
    }

    function filter(Request $request)
    {
        $searchTerm = $request->input('search');

        $buku = Buku::where('judul', 'LIKE', "%$searchTerm%")
                    ->orWhere('penulis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id_kategori', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tahun_terbit', 'like', '%' . $searchTerm . '%')
                    ->paginate(10); // Sesuaikan jumlah data yang ingin ditampilkan per halaman

        return view('dashboard/buku/buku', compact('buku', 'searchTerm'));
    }

    public function create()
    {
        $kategoriOptions = KategoriBuku::all();
        
        return view('dashboard/buku/upload', compact('kategoriOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'id_kategori.*' => 'required|exists:kategori_bukus,id',
            'pdf_file' => 'required|file|mimes:pdf', 
            'gambar_sampul_url' => 'required|url',
        ]);

        $pdfPath = $request->file('pdf_file')->store('public/pdf');

        $id_kategori = $request->input('id_kategori');

        $buku = new Buku([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'id_kategori' =>json_encode($id_kategori),
            'pdf_path' => Storage::url($pdfPath), // Get the URL from storage
            'gambar_sampul' => $request->input('gambar_sampul_url'),
        ]);

        $buku->save();

        return redirect()->route('buku')->with('success', 'Buku berhasil diunggah.');
    }
    
    function edit($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->id_kategori = json_decode($buku->id_kategori);

        $kategoriOptions = KategoriBuku::all();

        return view('dashboard/buku/edit', compact('buku', 'kategoriOptions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'id_kategori.*' => 'required|exists:kategori_bukus,id',
            'gambar_sampul_url' => 'required|url',
        ]);
    
        $buku = Buku::find($id);
    
        // Update the book attributes
        $buku->update([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'id_kategori' => json_encode($request->input('id_kategori')),
            'gambar_sampul_url' => $request->input('gambar_sampul_url'),
        ]);
    
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('public/pdf');
            $buku->update(['pdf_path' => Storage::url($pdfPath)]);
        }

        return redirect()->route('buku')->with('success', 'Buku berhasil diperbarui.');
    }

    function download($id)
    {
        $buku = Buku::findOrFail($id);

        $pdfUrl = $buku->pdf_path;

        return redirect($pdfUrl);
    }

    function cari()
    {   
        $buku = Buku::all(); 

        return view('layouts.search', compact('buku')); 
    }

    function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        
        $pdfUrl = $buku->pdf_path;
    
        $pdfPath = str_replace('storage', 'public', $pdfUrl);
        Storage::delete($pdfPath);
    

        $buku->delete();
    
        return redirect()->route('buku')->with('success', 'Buku berhasil dihapus.');
    }
    


}
