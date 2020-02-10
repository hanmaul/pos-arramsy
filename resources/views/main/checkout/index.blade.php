@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body invoice-head">
            <h3 style="text-align: center;"> --- PEMBAYARAN ---</h3>
        </div>
        <div class="card-body invoice-head">
            <div class="row">
                <div class="col-md-4 align-self-center">
                    <center>
                        <img src="{{asset('img/arramsyflorist.png')}}" alt="logo-large" class="logo-lg" height="80">
                    </center>
                </div>
                <div class="col-md-8">

                    <ul class="list-inline mb-0 contact-detail float-right">
                        <li class="list-inline-item">
                            <div class="pl-3">
                                <i class="mdi mdi-web"></i>
                                <p class="text-muted mb-0">www.arramsyflorist.com</p>
                                <p class="text-muted mb-0">www.arramsyflorist.com</p>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="pl-3">
                                <i class="mdi mdi-phone"></i>
                                <p class="text-muted mb-0">+123 123456789</p>
                                <p class="text-muted mb-0">+123 123456789</p>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="pl-3">
                                <i class="mdi mdi-map-marker"></i>
                                <p class="text-muted mb-0">2821 Kensington Road,</p>
                                <p class="text-muted mb-0">Avondale Estates, GA 30002 USA.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end card-body-->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="">
                        <h6 class="mb-0" style=""><b>Order Date :</b>@include('function.tglIndo')
                            {{ hari_ini(date("D")) }}, {{ tgl_indo(date("Y-m-d")) }}<br><br>
                        </h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <h6><b>Nama Kasir :</b> {{ Auth::user()->name }}</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        @foreach($carts as $q)
                        <h6><b>Kode Transaksi :</b> NT{{ $q->id }}</h6>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th colspan="2">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $c)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
                                        $c->produk->barcode, 'C39')}}" height="20" width="100">
                                            <span class="text-barcode">{{ $c->produk->barcode }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $c->produk->nama }}</td>
                                    <td>IDR {{ number_format($c->produk->harga_jual,2,',','.') }}$555.00</td>
                                    <td>{{ $c->jumlah }}</td>
                                    <td>IDR {{ number_format($c->sub_total,2,',','.') }}</td>
                                </tr>
                                @endforeach
                                <tr class="bg-dark text-white">
                                    <th colspan="2" class="border-0"></th>
                                    <th colspan="2" class="border-0"></th>
                                    <td class="border-0 font-14"><b>Total</b></td>
                                    <td class="border-0 font-14"><b>IDR {{ number_format($totalCarts,2,',','.') }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h5 class="mt-4">Syarat dan ketentuan :</h5>
                    <ul class="pl-3">
                        <li><small>Dapat menukar barang jika terjadi kecacatan</small></li>
                        <li><small>Nominal pembayaran sesuai hasil hitung kasir</small></li>
                        <li><small>Transaksi berlangsung sesuai persetujuan kedua belah pihak.</small></li>
                    </ul>
                </div>
                <div class="col-lg-6 align-self-end">
                    <div class="w-25 float-right">
                        <small>Manajer</small>
                        <img src="{{asset('vertical/assets/images/signature.png')}}" alt="" class="" height="48">
                        <p class="border-top">Arramsy</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                    <div class="text-center text-muted"><small>Terima Kasih telah berbelanja disini</small></div>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <div class="float-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-info text-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary text-light" data-toggle="modal" data-target="#modalCreate"><i class="fas fa-credit-card"></i> Pembayaran</a>
                        <a href="#" class="btn btn-danger text-light">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end card-->
</div>
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog confirm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('checkout.store') }}" class="needs-validation" novalidate="">
                @csrf
                <input type="hidden" name="total" value="{{ $totalCarts }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input id="radioCash" type="radio" name="metode_pembayaran" value="Cash" class="selectgroup-input" checked="">
                                <span class="selectgroup-button"><b>CASH</b></span>
                            </label>
                            <label class="selectgroup-item">
                                <input id="radioDana" type="radio" name="metode_pembayaran" value="Dana EBank" class="selectgroup-input">
                                <span class="selectgroup-button"><b>DANA EBANK</b></span>
                            </label>
                        </div>
                    </div>
                    <div id="cashContent">
                        <div class="form-group">
                            <label>Masukkan nominal</label>
                            <input type="text" class="form-control" name="bayar" required="">
                            <div class="invalid-feedback">
                                Form Bayar harus diisi!
                            </div>
                        </div>
                    </div>
                    <div id="danaContent">
                        <span><i>*Pembayaran dengan DANA EBANK sedang dalam proses.</i></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end col-->
@endsection