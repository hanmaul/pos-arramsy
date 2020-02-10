@extends('layouts.app')
@section('content')
@include('layouts.part.modalDestroy')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Data PPN</h3>
                </div>
                <div class="col-6">
                    <div class="button-items" style="text-align:right;">
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalCreate"><i class="dripicons-clipboard"></i> +</a>
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
                                <th>Nomor</th>
                                <th>Stok Minimum</th>
                                <th>PPN(%)</th>
                                <th>Dibuat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('function.tglIndo')
                            @foreach ($p as $q)
                            @php
                            $d = $q->created_at;
                            $t = $d->format('Y-m-d');
                            @endphp
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$q->stok_minimum}}</td>
                                <td>{{$q->ppn}}</td>
                                <td>
                                    <div class="badge badge-pill badge-primary">{{ tgl_indo($t) }}</div>
                                </td>
                                <td style="text-align:center">
                                    <div class="button-items">
                                        <a href="#modalEdit{{$q->id}}" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#modalEdit{{$q->id}}"><i class="mdi mdi-pencil-outline"></i></a>
                                        <a class="btn btn-danger waves-effect waves-light" href="#" data-uri="{{route('ppn.destroy', $q->id)}}" data-toggle="modal" data-target="#modalDestroy"><i class="mdi mdi-delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- end col -->
            </div> <!-- end row -->
            <div id="modalCreate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('ppn.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="primary-header-modalLabel">Tambah PPN
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <label>Minimum Stock</label>
                                <div class="form-group">
                                    <input type="number" name="stok_minimum" class="form-control">
                                </div>
                                <label>PPN</label>
                                <div class="form-group">
                                    <input type="number" name="ppn" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($p as $q)
            <div id="modalEdit{{$q->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('ppn.update', $q->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="primary-header-modalLabel">Ubah PPN
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <label>Minimum Stock</label>
                                <div class="form-group">
                                    <input type="text" name="stok_minimum" class="form-control" value="{{ $q->stok_minimum }}">
                                </div>
                                <label>PPN</label>
                                <div class="form-group">
                                    <input type="text" name="ppn" class="form-control" value="{{ $q->ppn }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end col -->

<!--end table-->

<!--Editor-->
<!-- <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">

                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{route('pengguna.store')}}" class="modal-content form-horizontal needs-validation" id="editor">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editor-title">Add Row</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        @csrf
                        <div class="modal-body">
                            <div class="form-group required row">
                                <label for="foto" class="col-sm-3 control-label">Foto</label>
                                <div class="col-sm-9">
                                    <h4 class="mt-0 header-title">Upload Foto</h4>
                                    <p class="text-muted mb-4">Tekan pilih file</p>
                                    <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="vertical/assets/plugins/dropify/images/1.jpg" />
                                    
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label for="namaLengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required>
                                    <div class="invalid-feedback">
                                        Isi Form Nama!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label for="level" class="col-sm-3 control-label">Level</label>
                                <div class="col-sm-9">
                                    <select class="form-control selectric" name="level" required>
                                        @php
                                        $level = ["Admin Utama", "Admin Gudang", "Kasir"]
                                        @endphp
                                        @foreach($level as $lvl)
                                        <option value="{{ $lvl }}">{{ $lvl }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih level!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="contoh@xxx">
                                    <div class="invalid-feedback">
                                        Isi Form Email!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label for="email" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="********">
                                    <div class="invalid-feedback">
                                        Isi Form Password!
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <div class="invalid-feedback">
                                        Isi Form Alamat!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-light">Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            end modal -->
</div>
<!--end card-body-->
</div>
<!--end card-->
</div>
<!--end col-->
@endsection