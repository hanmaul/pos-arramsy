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
    <h1>Laporan Transaksi</h1>
</center>
<div class="table-responsive">
    <table id="#" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Barcode Transaksi</th>
                <th>Total Pembelian</th>
                <th>Metode Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checkouts as $q)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($q->barcode, 'C39')}}" height="20" width="100">
                        <span class="text-barcode">{{ $q->barcode }}</span>
                    </div>
                </td>
                <td>IDR {{ number_format($q->total,2,',','.') }}</td>
                <td>{{ $q->metode_pembayaran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    window.print()
</script>