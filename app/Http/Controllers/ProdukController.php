<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Category;
use App\Unit;
use App\Currency;
use App\PersentaseKeuntungan;
use App\Ppn;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $p['produks'] = Produk::orderBy("id", "DESC")->get();
        return view("main.produk.index", $p);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $unit = Unit::orderBy('id', 'DESC')->get();
        $currency = Currency::orderBy('id', 'DESC')->get();
        $pers = PersentaseKeuntungan::orderBy('id', 'DESC')->get();
        $ppn = Ppn::orderBy('id', 'DESC')->get();
        return view('main.produk.create', compact('category', 'unit', 'currency', 'pers', 'ppn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $p = new Produk;
        $barcode = rand(0, PHP_INT_MAX);
        $p->barcode = $barcode;
        $p->category_id = $r->input('category_id');
        $p->currency_id = $r->input('currency_id');
        $p->unit_id = $r->input('unit_id');
        $p->nama = $r->input('nama');
        $p->stok = $r->input('stok');
        $p->harga_jual = $r->input('harga_jual');
        $p->harga_beli = $r->input('harga_beli');
        $p->keterangan = $r->input('keterangan');
        $p->diskon = $r->input('diskon');
        $p->laba = $r->input('laba');
        $p->ppn = $r->input('ppn');
        if ($r->diskon != null) {
            $diskon = $r->harga_jual * $r->diskon / 100;
            $minus = $r->harga_beli - $diskon;
            $persen = $minus * ($r->laba + $r->ppn) / 100;
            $p->harga_jual = $persen + $minus;
        } else {
            $persen = $r->harga_beli * ($r->laba + $r->ppn) / 100;
            $p->harga_jual = $r->harga_beli + $persen;
        }

        $p->save();
        return redirect()->route('produk.index')->with('success', 'berhasil tambah produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = Produk::find($id);
        return response()->json($p);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $unit = Unit::orderBy('id', 'DESC')->get();
        $currency = Currency::orderBy('id', 'DESC')->get();
        $pers = PersentaseKeuntungan::orderBy('id', 'DESC')->get();
        $ppn = Ppn::orderBy('id', 'DESC')->get();
        $produk = Produk::find($id);
        return view('main.produk.edit', compact('category', 'unit', 'currency', 'pers', 'ppn', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $p = Produk::find($id);
        $barcode = rand(0, PHP_INT_MAX);
        $p->barcode = $barcode;
        $p->category_id = $r->input('category_id');
        $p->currency_id = $r->input('currency_id');
        $p->unit_id = $r->input('unit_id');
        $p->nama = $r->input('nama');
        $p->stok = $r->input('stok');
        $p->harga_jual = $r->input('harga_jual');
        $p->harga_beli = $r->input('harga_beli');
        $p->keterangan = $r->input('keterangan');
        $p->diskon = $r->input('diskon');
        $p->laba = $r->input('laba');
        $p->ppn = $r->input('ppn');
        if ($r->diskon != null) {
            $diskon = $r->harga_jual * $r->diskon / 100;
            $minus = $r->harga_beli - $diskon;
            $persen = $minus * ($r->laba + $r->ppn) / 100;
            $p->harga_jual = $persen + $minus;
        } else {
            $persen = $r->harga_beli * ($r->laba + $r->ppn) / 100;
            $p->harga_jual = $r->harga_beli + $persen;
        }

        $p->save();
        return redirect()->route('produk.index')->with('success', 'berhasil tambah produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
