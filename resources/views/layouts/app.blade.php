<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', App::getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="author" content="Thomas Laure">
    <meta name="description" content="{{ __('meta.description') }}">

    <link rel="icon" href="" sizes="32x32" type="image/x-icon">
    <link rel="apple-touch-icon" href="">

    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="fr_FR">

    <title>{{ config('app.name') }} - @yield('title')</title>

    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body class="font-sans antialiased h-screen">
    @include('layouts.navbar')

    <main role="main" class="container px-4 md:px-0 max-w-4xl mt-10">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
