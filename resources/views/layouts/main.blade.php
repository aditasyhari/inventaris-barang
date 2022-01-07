<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') | Inventaris Bengkel</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
        <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

        @yield('css')

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="#" class="logo">
                        <span>
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24">
                        </span>
                        <i>
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </i>
                    </a>
                </div>

                @include('layouts.navbar')

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        @yield('breadcrumb')
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            @yield('content')        
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2022 Inventaris Bengkel <span class="d-none d-sm-inline-block">- Crafted with <i class="mdi mdi-heart text-danger"></i> by Dewi Titis Suminar.</span>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>

        <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

        <!-- Peity JS -->
        <script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>

        <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>

        <script src="{{ asset('assets/pages/dashboard.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        @yield('js')

    </body>

</html>