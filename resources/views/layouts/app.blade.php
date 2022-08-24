<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="meta_keyword" content="@yield('meta_keyword')">
    <meta name="meta_description" content="@yield('meta_description')">
    <meta name="author" content="@yield('author')">
    

    <title>@yield('title') </title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts/include/frontend/navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" defer></script>
    @livewireScripts
</body>
</html>
