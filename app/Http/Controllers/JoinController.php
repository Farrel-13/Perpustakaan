<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    public function innerJoin()
    {
        $bukus = Buku::join('kategoris', 'bukus.kode_kategori', '=', 'kategoris.kode_kategori')
            ->select('bukus.nama_buku', 'kategoris.nama_kategori')
            ->get();
        
        $kategoris = Kategori::all(); 

        return view('home', compact('bukus', 'kategoris'));
    }

    public function filter(Request $request)
    {
        $kategoris = Kategori::all(); 


        $bukus = Buku::join('kategoris', 'bukus.kode_kategori', '=', 'kategoris.kode_kategori')
            ->select('bukus.nama_buku', 'kategoris.nama_kategori')
            ->when($request->kategori, function ($query, $kategori) {
                return $query->where('kategoris.nama_kategori', $kategori);
            })
            ->get();

        return view('home', compact('bukus', 'kategoris'));
    }
}

