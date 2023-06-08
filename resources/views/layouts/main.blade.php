<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kinoy Store</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #F5F5F5">
        <!-- Navbar Brand-->
        <a class="navbar-brand d-flex align-items-center ps-3" href="#" style="white-space: nowrap;">
                <span class="text-danger text-uppercase fw-bolder font-monospace">Ki</span>
                <span class="text-success text-uppercase fw-bolder font-monospace">noy</span>
                <span class="text-primary text-uppercase fw-bolder font-monospace">Sto</span>
                <span class="text-warning text-uppercase fw-bolder font-monospace">re</span>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <span class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </span>
        <!-- Navbar-->
        @include('includes.navbar')
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- Sidebar -->
            @include('includes.sidebar')
        </div>
        <div id="layoutSidenav_content">
            {{-- Content --}}
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('js/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/datables-simple-demo.js') }}"></script>
</body>

</html>
