<?php

namespace App\Http\Controllers;

use App\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merek = Merk::all();
        return view('backend.merk.dashboard', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.merk.create');
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
            'merk' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $merek = Merk::create([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'gambar' => 'assets/merk/' .$new_gambar
        ]);

        $gambar->move('assets/merk/', $new_gambar);
        return redirect()->back()->with('success','Merk anda berhasil disimpan');
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
        $merek = Merk::findorfail($id);
        return view('backend.merk.edit', compact('merek'));
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
            'merk' => 'required'          
         ]);

        

        $merek = Merk::findorfail($id);

        if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('assets/merk/', $new_gambar);

        $merek_data = [
            'nama' => $request->nama,
            'merk' => $request->merk,
            'gambar' => 'assets/merk/' .$new_gambar   
        ];
        }
        else {
        $merek_data = [
            'nama' => $request->nama,
            'merk' => $request->merk
        ];
        }
    

        //$post->tags()->sync($request->tags);
        $merek->update($merek_data);

        
        return redirect('/merk')->with('success','Merk anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merek = Merk::findorfail($id);
        $merek->delete();

        return redirect()->back()->with('success','Merk Berhasil Dihapus');
    }
}
