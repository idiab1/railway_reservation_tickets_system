<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Unkown Page') || {{\App\Models\Setting::first()->web_name}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
</body>
</html>
