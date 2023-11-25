<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIPATS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('theme/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="theme/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('theme/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="theme/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('theme/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('theme/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('theme/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('theme/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('theme/images/logo.png')}}" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <!--  <a class="navbar-brand brand-logo" href="index.html"><img src="Admin/images/tantina.png" style="width:300px;height:40px;"></a>-->
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">{{ auth()->user()->name }}</span>
                    </a>
                    <div class=" dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="/logout">
                            <i class="mdi mdi-logout text-primary"></i>
                            Log Out
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                @if (auth()->user()->level == 'Admin')
                <li class="nav-item">
                    <a class="nav-link" href="../viewuser">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Data User</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->level == 'Admin'||
                auth()->User()->level == 'Peminjam' )
                <li class="nav-item">
                    <a class="nav-link" href="../viewdataats">
                        <i class="mdi mdi-book menu-icon"></i>
                        <span class="menu-title">Data Ats</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../viewdatapeminjam">
                        <i class="mdi mdi-book-minus menu-icon"></i>
                        <span class="menu-title">Peminjaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../viewdatapengembalian">
                        <i class="mdi mdi-book-plus menu-icon"></i>
                        <span class="menu-title">Pengembalian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout">
                        <i class="mdi mdi-login-variant menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
                @endif
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between flex-wrap">
                        </div>
                        @yield('konten')
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('theme/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('theme/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('theme/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('theme/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('theme/js/off-canvas.js')}}"></script>
    <script src="{{asset('theme/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('theme/js/template.js')}}"></script>
    <script src="{{asset('theme/js/settings.js')}}"></script>
    <script src="{{asset('theme/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('theme/js/jquery.cookie.js" type="text/javascript')}}"></script>
    <script src="{{asset('theme/js/dashboard.js')}}"></script>
    <script src="{{asset('theme/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->
</body>

</html>