<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div id="app" class="min-h-screen bg-gray-100">
@include('layouts.admin.navbar',['user'=> $user])
@include('layouts.admin.sidebar')

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1>
                <ul>
                    <li>{{__('Admin')}}</li>
                    <li>{{__('Dashboard')}}</li>
                </ul>
            </h1>
            <a href="https://github.com/GigaNByte" target="_blank" class="button pink">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>GitHub</span>
            </a>
        </div>
    </section>
    <main class="section main-section">
        {{ $content }}
    </main>
    @include('layouts.admin.footer')
</div>
</body>
</html>
