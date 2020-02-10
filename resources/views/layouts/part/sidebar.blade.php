<!-- Left Sidenav -->
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu" id="side-nav">
        <li class="menu-title">Main</li>
        <li>
            <a href="{{route('home')}}"><i class="fas fa-desktop"></i><span>Beranda</span></a>
        </li>
        @if(Auth::user()->level == "Admin Utama")
        <li class="menu-title">General</li>
        <li>
            <a href="{{route('toko.index')}}"><i class="fas fa-store-alt "></i><span>Toko</span></a>
        </li>
        <li>
            <a href="{{route('pengguna.index')}}"><i class="fas fa-users"></i><span>Pengguna</span></a>
        </li>
        <li class="menu-title">Komponen</li>
        <li>
            <a href="{{route('currencies.index')}}"><i class="fas fa-money-bill-wave"></i><span>Mata Uang</span></a>
        </li>
        <li>
            <a href="{{route('ppn.index')}}"><i class="fas fa-fax"></i><span>PPN</span></a>
        </li>
        <li>
            <a href="{{route('unit.index')}}"><i class="mdi mdi-apps"></i><span>Satuan</span></a>
        </li>
        <li>
            <a href="{{route('pers.index')}}"><i class="far fa-chart-bar"></i><span>Persentase Keuntungan</span></a>
        </li>
        <li>
            <a href="{{route('category.index')}}"><i class="fas fa-filter"></i><span>Kategori Produk</span></a>
        </li>
        <li class="menu-title">Gudang</li>
        <li>
            <a href="#"><i class="fas fa-archive"></i><span>Produk</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('produk.index')}}">Daftar Produk</a></li>
                <li><a href="{{route('produkmasuk')}}">Produk Masuk</a></li>
                <li><a href="{{route('produkkosong.index')}}">Produk Kosong</a></li>
            </ul>
        </li>
        <li class="menu-title">Transaksi</li>
        <li>
            <a href="{{route('transaksi.index')}}"><i class="fas fa-cart-plus"></i><span>Transaksi</span></a>
        </li>
        <li>
            <a href="{{route('invoice.index')}}"><i class="fas fa-clipboard-list"></i><span>Riwayat Transaksi</span></a>
        </li>
        @endif
        @if(Auth::user()->level == "Admin Gudang")
        <li class="menu-title">Komponen</li>
        <li>
            <a href="{{route('currencies.index')}}"><i class="fas fa-money-bill-wave"></i><span>Mata Uang</span></a>
        </li>
        <li>
            <a href="{{route('ppn.index')}}"><i class="fas fa-fax"></i><span>PPN</span></a>
        </li>
        <li>
            <a href="{{route('unit.index')}}"><i class="mdi mdi-apps"></i><span>Satuan</span></a>
        </li>
        <li>
            <a href="{{route('pers.index')}}"><i class="far fa-chart-bar"></i><span>Persentase Keuntungan</span></a>
        </li>
        <li>
            <a href="{{route('category.index')}}"><i class="fas fa-filter"></i><span>Kategori Produk</span></a>
        </li>
        <li class="menu-title">Gudang</li>
        <li>
            <a href="#"><i class="fas fa-archive"></i><span>Produk</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('produk.index')}}">Daftar Produk</a></li>
                <li><a href="{{route('produkmasuk')}}">Produk Masuk</a></li>
                <li><a href="{{route('produkkosong.index')}}">Produk Kosong</a></li>
            </ul>
        </li>
        @endif
        @if(Auth::user()->level == "Kasir")
        <li class="menu-title">Transaksi</li>
        <li>
            <a href="{{route('transaksi.index')}}"><i class="fas fa-cart-plus"></i><span>Transaksi</span></a>
        </li>
        <li>
            <a href="{{route('invoice.index')}}"><i class="fas fa-clipboard-list"></i><span>Riwayat Transaksi</span></a>
        </li>
        @endif
    </ul>
</div>
<!-- end left-sidenav-->