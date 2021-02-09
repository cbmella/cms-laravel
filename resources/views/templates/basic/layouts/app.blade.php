<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Front') }}</title>
    <script src="{{ asset('js/front.js') }}" defer></script>
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include("templates.{$template}.layouts.navbar")
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @include("templates.{$template}.layouts.footer")
    </div>
</body>

</html>