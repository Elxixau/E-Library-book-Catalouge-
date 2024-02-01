<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    private function getCommonData() {
        return [

            'ipAddress' => request()->ip(),

            'userAgent' => request()->header('User-Agent'),

            'kategori' => KategoriBuku::all(),

            'buku' => Buku::all(),

        ];
    }

    function home(){

        $data = $this->getCommonData();

        return view('layouts/profil', $data);
    
    }

    public function show($id)
{
    $ipAddress = request()->ip();
    $userAgent = request()->header('User-Agent');

    $category = kategoriBuku::find($id);
    $searchTerm = $category ? $category->kategori : 'Unknown Category';

    $books = Buku::where(function ($query) use ($id) {
        $query->where('id_kategori', 'like', '%' . $id. '%');
    })->get();    
    


    return view('books.hasil', compact('books', 'ipAddress', 'userAgent', 'searchTerm'));
}


    function tentangKami(){

        $data = $this->getCommonData();

        return view('layouts/tentangKami', $data);

    }

    function more(){

        $data = $this->getCommonData();

        return view('layouts/selengkapnya', $data);

    }

    function search(Request $request)
    {
    
        $ipAddress = request()->ip();

        $userAgent = request()->header('User-Agent');

        $searchTerm = request()->input('search');

        $books = Buku::where(function ($query) use ($searchTerm) {
            $query->where('judul', 'like', '%' . $searchTerm . '%')
                ->orwhere('penulis', 'like', '%' . $searchTerm . '%');
        })->get();    
        

        return view('books/hasil', compact('books', 'searchTerm', 'ipAddress', 'userAgent'));
    
    }

}
