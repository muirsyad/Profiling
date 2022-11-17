<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">

    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/Contact-Form-by-Moorcam.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/luden.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('customcss/cus.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body id="page-top">
    <style>
        .title2{
            margin-left: 68px;
        }
    </style>
    <div id="wrapper">
        {{-- navigation --}}
        <x-nav />


        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                {{-- top-nav --}}
                <x-nav-top-ad/>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            {{-- footer --}}
            <x-footer-ad/>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bs-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/js/luden1') }}"></script>
    <script src="{{ URL::asset('assets/js/luden') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/theme.js') }}"></script> --}}
</body>

</html>
