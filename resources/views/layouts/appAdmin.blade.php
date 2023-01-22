<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apatars-Go</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('templates/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('templates/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('logoago.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('logoago.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Avatars-GO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://cdn-icons-png.flaticon.com/512/147/147133.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-header">Menu</li>
                        <li class="nav-item">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/rombel') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Rombel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/siswa') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Izin</p>
                            </a>
                        </li>
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Rombel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Izin</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{asset('templates/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('templates/dist/js/adminlte.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('templates/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('templates/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('templates/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('templates/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('templates/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('templates/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('templates/dist/js/pages/dashboard2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('templates/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('templates/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('templates/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('templates/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>