<div class="sidebar-user media">
    @if(!empty(Auth::user()->foto))
    <img alt="image" src="{{ asset('img_upload/pengguna/'.Auth::user()->foto) }}" class="nav-img rounded-circle mr-1">
    @else
    <img alt="image" src="{{ asset('img/project1.jpg') }}" class="nav-img rounded-circle mr-1">
    @endif
    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
    <div class="media-body">
        <h5 class="text-light">{{Auth::user()->name}}</h5>
        <ul class="list-unstyled list-inline mb-0 mt-2">
            <li class="list-inline-item">
                <a href="{{route('profile')}}" class=""><i class="mdi mdi-account text-light"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="javascript: void(0);" class=""><i class="mdi mdi-settings text-light"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="{{route('logout')}}" class=""><i class="mdi mdi-power text-danger"></i></a>
            </li>
        </ul>
    </div>
</div>
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right align-item-center mt-2">
                @if(Auth::user()->level == "Admin Utama")
                <a href="{{route('produk.index')}}"><button class="btn btn-info px-4 align-self-center report-btn">Produk</button></a>
                @endif
            </div>
            <!-- <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>Dashboard</h4>
            <div class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard 1</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->