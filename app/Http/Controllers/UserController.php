<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = User::paginate(10);
        return view('backend.auth.ListUser', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $pelanggan = User::findorfail($id);
        return view('backend.auth.edit', compact('pelanggan'));
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
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'alamat' => 'required',
            'nohp' => 'required'
          ]);

         if($request->input('password')) {
            $pelanggan_data = [
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'password' => bcrypt($request->password)
                ];
         }
         else{
            $pelanggan_data = [
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp
                ];
         }

         $pelanggan = User::find($id);
         $pelanggan->update($pelanggan_data);

         return redirect()->route('user.index')->with('success','berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = User::find($id);
        $pelanggan->delete();

        return redirect()->back()->with('success','Product Berhasil Dihapus');
    }
}
