
<div class="col-12">
    <div class="card">
        <div class="card-header">
        <h3>Data Pengguna</h3>
        </div>
        <div class="card-body">
        <div class="button-items">
            <a href="{{route('pengguna.create')}}" class="btn btn-primary btn-square btn-outline-dashed waves-effect waves-light"><i class="mdi mdi-check-all mr-2"></i>Tambah</a>
            <a href="#" class="btn btn-success btn-square btn-outline-dashed waves-effect waves-light"><i class="mdi mdi-check-all mr-2"></i>Print</a>
        </div>
        <br>
            <table id="#" class="table mb-0" data-paging="true" data-filtering="true" data-sorting="true">
                <thead>
                    <tr>
                        <th data-name="no" data-breakpoints="xs" data-type="number">No.</th>
                        <th data-name="foto">Foto</th>
                        <th data-name="namaLengkap">Nama Lengkap</th>
                        <th data-name="email">Email</th>
                        <th data-name="level">Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengguna as $penggunas)
                    <tr data-expanded="true">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if(!empty($penggunas->foto))
                            <img src="{{ asset('img_upload/pengguna/'.$penggunas->foto) }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $penggunas->name }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                            @else
                            <img src="{{ asset('img/project1.jpg') }}" alt="foto" width="30" height="30" data-toggle="tooltip" data-original-title="{{ $penggunas->name }}" style="object-fit: cover;border-radius: 50%;border: 1px solid #6777ef;">
                            @endif
                        </td>
                        <td>{{$penggunas->name}}</td>
                        <td>{{$penggunas->email}}</td>
                        <!-- <td>{{$penggunas->level}}</td> -->
                         @if($penggunas->level == "Admin Utama")
                         <td><span class="badge badge-boxed  badge-success">Admin Utama</span></td>
                         @elseif($penggunas->level == "Admin Gudang")
                         <td><span class="badge badge-boxed  badge-warning">Admin Barang</span></td>
                         @elseif($penggunas->level == "Kasir")
                         <td><span class="badge badge-boxed  badge-danger">Kasir</span></td>
                         @endif   
                    </tr>
                    @endforeach
                </tbody>
            </table>