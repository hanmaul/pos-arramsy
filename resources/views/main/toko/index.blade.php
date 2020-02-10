@extends('layouts.app')
@section('content')
@include('layouts.part.modalDestroy')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Informasi Toko</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('toko.update', $i->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-lg-4 col-md-6">
                    <div class="card border-info">
                        <div class="card-header bg-info">
                            <h4 class="mb-0 text-white">Foto</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                @if(!empty($i->foto))
                                <img class="card-img-top img-fluid" src="{{ asset('img_upload/toko/'. $i->foto) }}" id="blah1" alt="Card image cap">
                                @else
                                <img class="card-img-top img-fluid" src="{{ asset('img/project1.jpg') }}" id="blah1" alt="Card image cap">
                                @endif
                                <br>
                                <br>
                                <div class="custom-file">
                                    <input type="file" class="form-control-file" id="exampleInputFile" name="foto" onchange="readURL1(this);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card border-info">
                        <div class="card-header bg-info">
                            <h4 class="mb-0 text-white">Informasi Toko</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama Toko</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama" value="{{ $i->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Kode Pos</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="kode_pos" value="{{ $i->kode_pos }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Telepon</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="telepon" value="{{ $i->telepon }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Keterangan</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keterangan" value="{{ $i->keterangan }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Alamat</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="alamat" rows="5">{!! $i->alamat !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end col -->
        </div> <!-- end row -->
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