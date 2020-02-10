@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Produk</h3>
        </div>
        <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nama" required="">
                            <div class="invalid-feedback">
                                Isi Nama Produk!!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control selectric" name="category_id" required>
                                <option value="">&mdash;</option>
                                @foreach($category as $q)
                                <option value="{{ $q->id }}">{{ $q->category }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Isi Kategori!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stok" required="">
                            <div class="invalid-feedback">
                                Isi Stok!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Mata Uang</label>
                            <select class="form-control selectric" name="currency_id" required>
                                <option value="">&mdash;</option>
                                @foreach($currency as $q)
                                <option value="{{ $q->id }}">{{ $q->currency }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Form Currency harus diisi!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>Unit</label>
                            <select class="form-control selectric" name="unit_id" required>
                                <option value="">&mdash;</option>
                                @foreach($unit as $q)
                                <option value="{{ $q->id }}">{{ $q->unit }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Form Unit harus diisi!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control" name="harga_beli" required="">
                            <div class="invalid-feedback">
                                Isi harga beli!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <select class="form-control selectric" name="laba" required>
                                        <option value="">Persentase Laba</option>
                                        @foreach($pers as $q)
                                        <option value="{{ $q->persentase_keuntungan }}">{{ $q->persentase_keuntungan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select class="form-control selectric" name="ppn" required>
                                        <option value="">Stok Minimum &mdash; PPN</option>
                                        @foreach($ppn as $q)
                                        <option value="{{ $q->ppn }}">{{ $q->stok_minimum }} &mdash; {{ $q->ppn }}%</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Isi Harga Jual!
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="form-group">
                            <label>Diskon Produk</label>
                            <input type="number" class="form-control" name="diskon">
                            <div class="invalid-feedback">
                                Isi Diskon Produk!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Deskpripsi</label>
                            <textarea class="form-control" rows="5" name="keterangan" required=""></textarea>
                            <div class="invalid-feedback">
                                Isi Form Deskripsi!
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" id="submit-btn">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection