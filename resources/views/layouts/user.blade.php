<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
        <!-- Scripts -->
        <script src="{{ asset('js/user.js') }}" defer></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    </head>
    <body class="font-sans antialiased min-h-screen ">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.user.navbar')

            <header class="bg-white shadow ">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                </div>
            </header>
            <main class="min-h-screen flex flex-col justify-center">
                {{ $content }}
            </main>
            @include('layouts.user.footer')

        </div>
    </body>

</html>
