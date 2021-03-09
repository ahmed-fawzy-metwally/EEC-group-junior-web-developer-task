<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">   
    @yield('css')
</head>

<body>
    <div id="main-content">
        @include('admin.includes.header')
        <div class="container-fluid content m-0 p-0">
            <div class="row m-0 p-0">
                <div class="col-12 mt-2 p-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
    @yield('script')
</body>

</html>
