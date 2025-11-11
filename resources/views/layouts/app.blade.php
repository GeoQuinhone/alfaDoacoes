<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistema de Doações</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white shadow-lg">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/LogoAlfaDoacoes.png') }}" alt="Logo"
                        class="mx-auto md:mx-0 w-24 mb-1">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold">Sistema Alfa Doações</a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-home mr-1"></i> Painel Principal
                    </a>
                    <a href="{{ route('instituicoes.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-building mr-1"></i> Instituições
                    </a>
                    <a href="{{ route('itens.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-box mr-1"></i> Itens
                    </a>
                    <a href="{{ route('doacoes.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-gift mr-1"></i> Doações
                    </a>
                    <a href="{{ route('doacoes.minhas') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-heart mr-1"></i> Minhas Doações
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-sm">Olá, {{ Auth::user()->name ?? 'Visitante' }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-700 hover:bg-blue-800 px-3 py-1 rounded transition">
                            <i class="fas fa-sign-out-alt mr-1"></i> Sair
                        </button>
                    </form>
                </div>
            </div>

            <div class="md:hidden mt-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-home mr-2"></i> Painel Principal
                    </a>
                    <a href="{{ route('instituicoes.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-building mr-2"></i> Instituições
                    </a>
                    <a href="{{ route('itens.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-box mr-2"></i> Itens
                    </a>
                    <a href="{{ route('doacoes.index') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-gift mr-2"></i> Doações
                    </a>
                    <a href="{{ route('doacoes.minhas') }}" class="hover:text-blue-200 transition">
                        <i class="fas fa-heart mr-2"></i> Minhas Doações
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-10 mt-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 items-center text-center md:text-left">

            <div>
                <h3 class="text-xl font-semibold mb-3">Sistema de Doações</h3>
                <p class="text-gray-400 text-sm mb-2">
                    &copy; {{ date('Y') }} Todos os direitos reservados.
                </p>
                <p class="text-gray-400 text-sm">
                    Desenvolvido com muito carinho para ajudar quem precisa!!
                </p>
            </div>

            <div class="w-full h-56 rounded-lg overflow-hidden shadow-md">
                <iframe class="w-full h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d729.7119169458406!2d-53.28170843142593!3d-23.754419098687663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f2d1e658459f85%3A0x7b81c993c8545f96!2sFaculdade%20ALFA%20Umuarama%20-%20UniALFA!5e1!3m2!1spt-BR!2sbr!4v1762298507027!5m2!1spt-BR!2sbr"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-3">Suporte</h3>
                <p class="text-gray-400 text-sm mb-2">Entre em contato conosco:</p>
                <p>
                    <a href="mailto:suporte@doacoes.org" class="text-blue-400 hover:text-blue-300 transition">
                        suporte@alfadoacoes.com.br
                    </a>
                </p>
                <p class="mt-2">
                    <a href="https://wa.me/5544984520448" target="_blank"
                        class="inline-block bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg transition">
                        Falar no WhatsApp
                    </a>
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
