<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Product::all();
        return view('backend.produk.dashboard', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'merk_id' => 'required',
            'is_ready' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $barang = Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'merk_id' => $request->merk_id,
            'is_ready' => $request->is_ready,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'gambar' => 'assets/jersey/' .$new_gambar
        ]);

        $gambar->move('assets/jersey/', $new_gambar);
        return redirect()->back()->with('success','Product anda berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Product::findorfail($id);
        return view('backend.produk.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'merk_id' => 'required',
            'is_ready' => 'required',
            'jenis' => 'required',
            'berat' => 'required'           
         ]);

        

        $barang = Product::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('assets/jersey/', $new_gambar);

        $barang_data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'merk_id' => $request->merk_id,
            'is_ready' => $request->is_ready,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'gambar' => 'assets/jersey/' .$new_gambar   
        ];
        }
        else {
        $barang_data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
            'merk_id' => $request->merk_id,
            'is_ready' => $request->is_ready,
            'jenis' => $request->jenis,
            'berat' => $request->berat
        ];
        }
    

        //$post->tags()->sync($request->tags);
        $barang->update($barang_data);

        
        return redirect('/tester')->with('success','Product anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Product::findorfail($id);
        $barang->delete();

        return redirect()->back()->with('success','Product Berhasil Dihapus');
    }
}
