<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="/css/sb-admin-2.css" rel="stylesheet"> --}}
    @vite(['resources/assets/scss/sb-admin-2.scss'], ['resources/css/app.css'])

</head>

<body id="page-top">
    <div id="wrapper">

        @include('partials.home.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('partials.home.header')

                @yield('container')

            </div>

            @include('partials.home.footer')

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('partials.home.script')

</body>

</html>
