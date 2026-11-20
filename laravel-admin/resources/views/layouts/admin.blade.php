<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel Admin')</title>
    <link href="{{ asset('sb-vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            {{-- HEADER --}}
            @include('partials.header')

            {{-- CONTENT --}}
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        {{-- FOOTER --}}
        @include('partials.footer')
    </div>
</div>

<script src="{{ asset('sb-vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>