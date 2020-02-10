@extends('layouts.app')
@section('content')
@include('layouts.part.modalDestroy')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Profil Saya</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('updateProfile', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate="" style="width: 100%;display: flex;flex-wrap:wrap;">
                @csrf
                {{ method_field('PUT') }}
                <div class="col-12 col-lg-4">
                    <div class="card ">
                        <div class="card-header bg-info">
                            <h4 style="color:white">Foto Pengguna</h4>
                        </div>
                        <div class="card-body foto-upload">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    @if(!empty($user->foto))
                                    <img class="card-img-top img-fluid" src="{{ asset('img_upload/pengguna/'. $user->foto) }}" id="blah1" alt="Card image cap">
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
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card ">
                        <div class="card-header bg-info">
                            <h4 style="color:white">Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" required="" value="{{ $user->name }}">
                                        <div class="invalid-feedback">
                                            Form Nama Lengkap harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control selectric" name="level" disabled>
                                            <option value="{{ $user->level }}" selected>{{ $user->level }}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Form Level harus diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                        <div class="invalid-feedback">
                                            Form Email harus diisi!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                        <div class="invalid-feedback">
                                            Form Password harus diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="5" required>{!! $user->alamat !!}</textarea>
                                        <div class="invalid-feedback">
                                            Form Alamat harus diisi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" id="submit-btn">Simpan</button>
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
@endsection