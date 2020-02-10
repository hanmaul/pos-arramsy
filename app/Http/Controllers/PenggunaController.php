<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();
        return view('main.pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = User::all();
        return view('main.pengguna.create', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users'
        ]);
        $pengguna = new User;
        $pengguna->name = $request->input("name");
        $pengguna->email = $request->input("email");
        $pengguna->alamat = $request->input("alamat");
        $pengguna->level = $request->input("level");
        $pengguna->password = bcrypt($request->input("password"));
        $pengguna->koperasi_id = 1;

        $foto = $request->file('foto');

        if (!empty($foto)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(100)) . "." . $foto->extension();
            $rand_md5 = md5($rand) . "." . $foto->extension();
            $pengguna->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'), $rand_md5);
        }

        $pengguna->save();

        return redirect(route('pengguna.index'))->with('sukses', 'Berhasil tambah data!');
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
        $pengguna = User::find($id);
        return view('main.pengguna.edit', compact('pengguna'));
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
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->alamat = $request->alamat;
        $pengguna->level = $request->level;
        if (!empty($request->password)) {
            $pengguna->password = bcrypt($request->password);
        }
        $pengguna->koperasi_id = 1;
        $foto = $request->file('foto');
        if (!empty($foto)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(100)) . "." . $foto->extension();
            $rand_md5 = md5($rand) . "." . $foto->extension();
            $pengguna->foto = $rand_md5;

            $foto->move(public_path('img_upload/pengguna'), $rand_md5);
        }
        $pengguna->save();
        return redirect(route('pengguna.index'))->with('sukses', 'Berhasil ubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect(route('pengguna.index'))->with('sukses', 'Berhasil hapus data!');
    }

    public function print()
    {

        $d['users'] = User::orderBy("id", "DESC")->get();
        $d['informasiTokos'] = InformasiToko::first();

        return view("main.users.print", $d);
    }
}
