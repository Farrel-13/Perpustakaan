<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
        return view('bukus.index',compact('bukus'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'kode_kategori' => 'required',
        ]);
        
        
        Buku::create($request->all());
   
        return redirect()->route('bukus.index')->with('success','Buku created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit',compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'kode_kategori' => 'required',
        ]);
  
        $buku->update($request->all());
  
        return redirect()->route('bukus.index')->with('success','Buku updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
  
        return redirect()->route('bukus.index')->with('success','Buku deleted successfully');
    }
}
