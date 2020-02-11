<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d['user'] = User::find(\Auth::user()->id);
        return view('main.profile.index', $d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        $d = User::find($id);
        $d->name = $request->input("name");
        $d->alamat = $request->input("alamat");
        if (!empty($request->input("password"))) {
            $d->password = \Hash::make($request->input("password"));
        }
        $d->koperasi_id = 1;

        $foto = $request->file('foto');

        if (!empty($foto)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(100)) . "." . $foto->extension();
            $rand_md5 = md5($rand) . "." . $foto->extension();
            $d->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'), $rand_md5);
        }

        $d->save();
        
        return redirect()->route('profile')->with('success', 'barhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }
}
