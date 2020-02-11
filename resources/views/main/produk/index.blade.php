@extends('layouts.app')
@section('content')
@include('layouts.part.modalDestroy')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Daftar Produk</h3>
                </div>
                <div class="col-6">
                    <div class="button-items" style="text-align:right;">
                        <a href="{{route('produk.create')}}" class="btn btn-primary waves-effect waves-light"><i class="dripicons-clipboard"></i> +</a>
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
                                <th>Harga Jual</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $q)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($q->barcode, 'C39')}}" height="40" width="180">
                                        <span class="text-barcode">{{ $q->barcode }}</span>
                                    </div>
                                </td>
                                <td>{{ $q->nama }}</td>
                                <td>{{ $q->category->category }}</td>
                                <td>{{ $q->stok}}</td>
                                <td>{{ $q->currency->currency }} {{ number_format($q->harga_jual,2,',','.') }}</td>
                                <td style="text-align:center">
                                    <div class="button-items">
                                        <a href="{{ route('produk.edit', $q->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-uri="{{ route('produk.destroy', $q->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDestroy"><i class="fas fa-trash-alt"></i></a>
                                    </div>
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
@endsection