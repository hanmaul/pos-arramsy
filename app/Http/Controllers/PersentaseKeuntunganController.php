<?php

namespace App\Http\Controllers;

use App\PersentaseKeuntungan;
use Illuminate\Http\Request;

class PersentaseKeuntunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pers = PersentaseKeuntungan::orderBy('id', 'DESC')->get();
        return view('main.pers.index', compact('pers'));
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
    public function store(Request $r)
    {
        $pers = new PersentaseKeuntungan;
        $pers->persentase_keuntungan = $r->input('persentase_keuntungan');
        $pers->save();
        return redirect()->route('pers.index')->with('success', 'OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersentaseKeuntungan  $persentaseKeuntungan
     * @return \Illuminate\Http\Response
     */
    public function show(PersentaseKeuntungan $persentaseKeuntungan)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersentaseKeuntungan  $persentaseKeuntungan
     * @return \Illuminate\Http\Response
     */
    public function edit(PersentaseKeuntungan $persentaseKeuntungan)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersentaseKeuntungan  $persentaseKeuntungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $pers = PersentaseKeuntungan::find($id);
        $pers->persentase_keuntungan = $r->input('persentase_keuntungan');
        $pers->save();
        return redirect()->route('pers.index')->with('success', 'OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersentaseKeuntungan  $persentaseKeuntungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pers = PersentaseKeuntungan::find($id);
        $pers->delete();
        return redirect()->route('pers.index');
    }
}
