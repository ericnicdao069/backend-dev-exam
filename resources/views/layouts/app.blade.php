<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('metas')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        @auth
            @inertiaHead
        @endauth

        @stack('styles')
    </head>
    <body class="antialiased {{ $bodyClass ?? '' }}">
        @guest
            @yield('content')
        @endguest

        @auth
            @inertia
            @routes
        @endauth
    </body>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @vite([
        'resources/js/plugins/jquery/jquery.min.js',
        'resources/js/plugins/jquery-ui/jquery-ui.min.js',
        'resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/js/dist/js/adminlte.js',
        'resources/js/app.js'
    ])
    @stack('scripts')
</html>
