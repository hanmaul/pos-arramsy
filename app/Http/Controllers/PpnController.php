<?php

namespace App\Http\Controllers;

use App\Ppn;
use Illuminate\Http\Request;

class PpnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Ppn::all();
        return view('main.ppn.index', compact('p'));
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
        $p = new Ppn;
        $p->stok_minimum = $request->input('stok_minimum');
        $p->ppn = $request->input('ppn');
        $p->save();
        return redirect(route('ppn.index'))->with('success', 'Berhasil menambah ppn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function show(Ppn $ppn)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppn $ppn)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $p = Ppn::find($id);
        $p->stok_minimum = $request->input('stok_minimum');
        $p->ppn = $request->input('ppn');
        $p->save();
        return redirect(route('ppn.index'))->with('success', 'berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ppn  $ppn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Ppn::find($id);
        $p->delete();
        return redirect(route('ppn.index'))->with('success', 'berhasil hapus data');
    }
}
