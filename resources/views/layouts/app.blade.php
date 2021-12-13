<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Unkown Page') || {{\App\Models\Setting::first()->web_name}}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Flag Icon -->
    <link rel="stylesheet" href="{{asset('plugins/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- material design icons -->
    <link rel="stylesheet" href="{{asset('plugins/mdi/css/materialdesignicons.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @if (app()->getLocale() == 'ar')
    <!-- RTL: style -->
        <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/media-query-rtl.css')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700" >

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @endif

</head>
<body>
    <div id="app">
        {{-- Navbar --}}
        @include('include.navbar', [
            'setting' => \App\Models\Setting::first()
        ])

        {{-- Header --}}
        @section('header')
            @include('include.header')
        @show

        {{-- Main Content --}}
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        @include('include.footer', [
            'setting' => \App\Models\Setting::first()
        ])

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
