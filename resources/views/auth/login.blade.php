<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.part.head')
    </head>

    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                        <div class="px-3">
                            <div class="media">
                                <a href="#" class="logo logo-admin"><img src="{{asset('img/arramsyflorist.png')}}" height="55" alt="logo" class="my-3"></a>
                                <div class="media-body ml-3 align-self-center">                                                                                                                       
                                    <h4 class="mt-0 mb-1">Arramsy Florist</h4>
                                    <p class="text-muted mb-0">Masuk ke halaman</p>
                                </div>
                            </div>                            
                            
                            <form class="needs-validation" action="{{ route('login')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email">
                                    </div>                                    
                                </div>
    
                                <div class="form-group">
                                    <label for="userpassword">Kata Sandi</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Kata Sandi">
                                    </div>                                
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>                            
                            </form>
                        </div>                      
                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center"> 
                    <div class="account-title text-white text-center">
                        <h4 class="mt-3"><i>Arramsy Florist</i></h4>
                        <div class="border w-25 mx-auto border-primary"></div>
                        <h2 class=""><b>Selamat Datang</b></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>


