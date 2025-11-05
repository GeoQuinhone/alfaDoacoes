<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!--
          FUNDO:
          Define o fundo como 'bg-gray-50' (cinza bem claro),
          para imitar o fundo 'quase branco' da sua página principal.
        -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">

            <!-- Logo e Título -->
            <div>
                <a href="/" class="flex justify-center">
                    <!-- Certifique-se que o caminho da logo está correto -->
                    <img src="{{ asset('images/LogoAlfaDoacoes.png') }}" alt="Logo Alfa Doações" class="w-20 h-auto">
                </a>

                <h2 class="mt-4 text-center text-2xl font-bold text-gray-900">
                    Acesse o Sistema de Doações
                </h2>
                <p class="text-center text-gray-600 text-sm">
                    Faça login para continuar
                </p>
            </div>

            <!--
              CARD:
              Este é o card branco que envolve o formulário ($slot).
            -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
