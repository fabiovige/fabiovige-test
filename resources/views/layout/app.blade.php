<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name') }} </title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('styles')

</head>
<body>
<div id="app">
    <div class="container py-3">
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                        <span class="text-muted small">Fabio dos Santos Martins</span>
                        <span class="text-muted small">fabiovige@gmail.com</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" ></script>

@stack('scripts')

</body>
</html>
