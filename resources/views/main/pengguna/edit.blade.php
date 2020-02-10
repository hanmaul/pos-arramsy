@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Pengguna</h3>
        </div>
        <form action="{{route('pengguna.update', $pengguna->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation">
            @csrf
            {{ method_field('PUT') }}
            <div class="card-body">
                <div class="form-group">
                    <h4 class="mt-0 header-title">Pilh Foto</h4>
                    <p class="text-muted mb-4">silahkan tekan pilih file</p>
                    <input type="file" name="foto" id="input-file-now" class="dropify" />
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{$pengguna->name}}" name="name" required="">
                    <div class="invalid-feedback">
                        Form Nama Lengkap harus diisi!
                    </div>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control selectric" name="level" required>
                        @php
                        $l = ["Admin Utama", "Admin Gudang", "Kasir"]
                        @endphp
                        @foreach($l as $ls)
                        <option value="{{ $ls }}">{{ $ls }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Form Level harus diisi!
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$pengguna->email}}" required="">
                    <div class="invalid-feedback">
                        Form Email harus diisi!
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required="">
                    <div class="invalid-feedback">
                        Form Password harus diisi!
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" rows="5" name="alamat" id="alamat">{!! $pengguna->alamat !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection