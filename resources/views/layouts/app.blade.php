<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.part.head')
    @inlcude('layouts.part.modalDestroy')
</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        @include('layouts.part.navbar')
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            @include('layouts.part.afternavbar')
        </div>
    </div>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            @include('layouts.part.sidebar')

            <!-- Page Content-->
            @include('layouts.part.content')
        </div>
    </div>
    <!-- end page-wrapper -->

    @include('layouts.part.script')

</body>

</html>