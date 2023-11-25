<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login SIPATS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('Admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('theme/images/logo.png')}}">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <center>
                                <div class="brand-logo">
                                    <a href="home" target="blank"><img src="theme/images/logologin.png" alt="logo"></a>
                                </div>
                                <h4>Selamat Datang</h4>
                                <h6 class="font-weight-light">Silakan Login Terlebih Dahulu</h6>
                            </center>
                            <form method="POST" action="/proseslogin" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Username" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn bg-dark text-white w-100 my-4 mb-2">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src=".{{asset('Admin/vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('Admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('Admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('Admin/js/template.js')}}"></script>
    <!-- endinject -->
</body>

</html>