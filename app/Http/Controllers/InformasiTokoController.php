<?php

namespace App\Http\Controllers;

use App\InformasiToko;
use Illuminate\Http\Request;

class InformasiTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = InformasiToko::first();
        return view('main.toko.index', compact('i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

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
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiToko $informasiToko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function edit(InformasiToko $informasiToko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $i = InformasiToko::find($id);
        $i->nama = $request->input('nama');
        $i->alamat = $request->input('alamat');
        $i->telepon = $request->input('telepon');
        $i->keterangan = $request->input('keterangan');
        $i->kode_pos = $request->input('kode_pos');
        $foto = $request->file('foto');

        if (!empty($foto)) {
            $rand = bin2hex(openssl_random_pseudo_bytes(100)) . "." . $foto->extension();
            $rand_md5 = md5($rand) . "." . $foto->extension();
            $i->foto = $rand_md5;

            $foto->move(public_path('img_upload/toko'), $rand_md5);
        }
        $i->save();
        return redirect(route('toko.index'))->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformasiToko  $informasiToko
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformasiToko $informasiToko)
    {
        //
    }
}
