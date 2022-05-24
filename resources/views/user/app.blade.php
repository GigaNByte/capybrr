<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

    <script src="{{ asset('js/admin.js') }}" defer></script>

</head>
<body class="font-sans antialiased">
<div id="app" class="min-h-screen bg-gray-100">
    @include('layouts.user.navbar',['user'=> $user])

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>{{ __('User') }}</li>
                <li>{{ __('Dashboard') }}</li>
            </ul>
            <a href="https://github.com/GigaNByte" target="_blank" class="button blue">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>{{ __('Capibrr on GitHub') }}</span>
            </a>
        </div>
    </section>
    <main class="section main-section">
        {{ $content }}
    </main>
    @include('layouts.user.footer')
</div>
</body>
</html>
