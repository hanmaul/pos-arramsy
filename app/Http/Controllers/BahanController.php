<?php

namespace App\Http\Controllers;

use App\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b = Bahan::all();
        
        return view('main.bahan.index', $b);
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
        $b = new Bahan;
        $b->bahan = $request->input('bahan');
        $b->satuan = $request->input('satuan');
        $b->save();

        return redirect(route('bahan.index'))->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahan $bahan)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $b = Bahan::find($id);
        $b->bahan = $request->input('bahan');
        $b->satuan = $request->input('satuan');
        $b->save();
        return redirect(route('bahan.index'))->with('success', 'berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Bahan::find($id);
        $bahan = $b->bahan;
        $b->delete();
        return redirect(route('bahan.index'))->with('success','berhasil hapus data');
    }
}
