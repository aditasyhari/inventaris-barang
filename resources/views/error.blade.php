<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Error | Inventaris Bengkel</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-block">

                    <div class="ex-page-content text-center">
                        <h1 class="text-dark">
                            <span class="text-danger">5</span><span class="text-success">0</span><span class="text-info">0</span>
                        </h1>
                        <h4 class="">Internal Server Error</h4><br>

                        @if ($message = Session::get('e'))
                            {{ $message }}
                        @endif

                        <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ url()->previous() }}"><i class="mdi mdi-chevron-left"></i> Back</a>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">© 2022 Inventaris Bengkel. Crafted with <i class="mdi mdi-heart text-danger"></i> by Dewi Titis Suminar</p>
            </div>

        </div>

            
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>

    </body>

</html>