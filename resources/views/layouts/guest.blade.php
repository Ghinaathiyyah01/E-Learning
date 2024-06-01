<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMKS 9 Muhammadiyah</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        .card-blur{
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" 
        style="background-image: url('{{ asset('img/logo/bg.png') }}'); background-size: cover; background-position: center;">
    

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg card-blur">
            <div class="flex flex-col sm:justify-center items-center py-6">
                <a href="/">
                    <img src="{{ asset('img/logo/logoo.png') }}" class="w-20 h-20 fill-current text-gray-500"
                        alt="Logo">
                </a>
            </div>
             {{ $slot }}
        </div>
    </div>
</body>

</html>
