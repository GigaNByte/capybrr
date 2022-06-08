<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

</head>
<body>
    <header class="relative flex items-center justify-center overflow-hidden">
        <video autoplay loop muted class="absolute z-10 w-auto min-w-full min-h-full max-w-none brightness-25">
            <source
                src="{{ URL::asset('storage/videos/capybara.mp4') }}"
                type="video/mp4"/>
            Your browser does not support the video tag.
        </video>
        <div class="relative z-30 p-5 text-2xl text-white bg-opacity-100 rounded-xl">
            <div class="font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
        </div>
    </header>
    <main class="section main-section">
    </main>
    @include('layouts.guest.footer')
</body>
</html>
