<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Doações - Bem-vindo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen">
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/LogoAlfaDoacoes.png') }}" alt="Logo"
                        class="mx-auto md:mx-0 w-16 mb-1">
                    <span class="text-2xl font-bold text-gray-800">Sistema de Doações</span>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}"
                        class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-lg font-medium transition">
                        Entrar
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                        Cadastrar
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="text-center max-w-4xl mx-auto">
            <div class="mb-8">
                <i class="fas fa-hand-holding-heart text-8xl text-blue-600 mb-6"></i>
            </div>

            <!-- Título e Descrição -->
            <h1 class="text-5xl font-bold text-gray-800 mb-6">
                Faça a Diferença na Vida de Quem Precisa
            </h1>
            <p class="text-xl text-gray-600 mb-12 leading-relaxed">
                Conectamos doadores a instituições de caridade. Sua doação pode transformar vidas e
                construir um mundo melhor para todos. Junte-se a nossa comunidade solidária.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <i class="fas fa-heart text-4xl text-red-500 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Doe com Segurança</h3>
                    <p class="text-gray-600">Todas as instituições são verificadas e confiáveis</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <i class="fas fa-bullseye text-4xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Acompanhe o Impacto</h3>
                    <p class="text-gray-600">Veja como sua doação está fazendo a diferença</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <i class="fas fa-users text-4xl text-purple-500 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Comunidade Solidária</h3>
                    <p class="text-gray-600">Junte-se a milhares de doadores comprometidos</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pronto para Começar?</h2>
                <p class="text-gray-600 mb-8">
                    Cadastre-se agora e descubra como você pode ajudar instituições que fazem a diferença
                    na sua comunidade.
                </p>

                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('register') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition flex items-center justify-center">
                        <i class="fas fa-user-plus mr-3"></i>
                        Criar Minha Conta
                    </a>

                    <a href="{{ route('login') }}"
                        class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-4 rounded-lg text-lg font-semibold transition flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-3"></i>
                        Fazer Login
                    </a>
                </div>

                <p class="text-gray-500 text-sm mt-6">
                    Já tem uma conta?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Clique aqui para entrar
                    </a>
                </p>
            </div>
        </div>
    </main>

    <section class="bg-blue-600 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl font-bold mb-2">+100</div>
                    <div class="text-blue-200">Instituições</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">+50</div>
                    <div class="text-blue-200">Doações Realizadas</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">+80</div>
                    <div class="text-blue-200">Doadores Ativos</div>
                </div>
                <div>
                    <div class="text-3xl font-bold mb-2">24h</div>
                    <div class="text-blue-200">Suporte Disponível</div>
                </div>
            </div>
        </div>
    </section>

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
