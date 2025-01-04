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

    <meta property="og:title" content="CrossPost">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="fr_FR">

    <title>CrossPost - @yield('title')</title>
</head>
<body>
    @include('layouts.navbar')

    <main role="main">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
