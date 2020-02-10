@include('layouts.part.head')
<style>
    body {
        background-color: #fff !important;
    }

    .img-print img {
        width: 100px;
    }
</style>
<center>
    <h1>Laporan Produk Masuk</h1>
</center>
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Barcode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    window.print()
</script>