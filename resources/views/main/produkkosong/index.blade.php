@extends('layouts.app')
@section('content')
@include('layouts.part.modalDestroy')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Stok Kosong</h3>
                </div>
                <div class="col-6">
                    <div class="button-items" style="text-align:right;">
                        <a target="blank" href="{{route('printProdukKosong')}}" class="btn btn-info waves-effect waves-light"><i class="dripicons-print"></i> 🡒</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $q)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($q->barcode, 'C39')}}" height="20" width="100">
                                        <span class="text-barcode">{{ $q->barcode }}</span>
                                    </div>
                                </td>
                                <td>{{ $q->nama }}</td>
                                <td>{{ $q->category->category }}</td>
                                <td>{{ $q->stok}}</td>
                                <td style="text-align:center">
                                    <button __nama="{{ $q->nama }}" __action="{{ route('produkkosong.update', $q->id) }}" class="edit btn btn-warning btn-sm"><i class="fas fa-plus"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
</div>

<button id="openFormCreate" data-toggle="modal" data-target="#modalCreate" hidden></button>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                &nbsp;&nbsp;<span id="namaProduk" class="badge badge-secondary"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreate" method="POST" action="" class="needs-validation" novalidate="">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input type="text" class="form-control" name="stok" value="" required="" placeholder="Stok">
                    <div class="invalid-feedback">
                        Isi Stok!!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection