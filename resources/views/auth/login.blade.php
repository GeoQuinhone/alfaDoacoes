<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <!-- Traduzido -->
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <!-- Traduzido -->
            <x-input-label for="password" value="Senha" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Lembrar-me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <!--
                  CORREÇÃO DE COR:
                  Mudado de 'text-indigo-600' (roxo padrão do Breeze) para 'text-blue-600' (azul da sua marca).
                -->
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <!-- Traduzido -->
                <span class="ms-2 text-sm text-gray-600">Lembrar-me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <!--
                  CORREÇÃO DE COR E TEXTO:
                  Link "Esqueceu a senha" estilizado com azul e traduzido.
                -->
                <a class="underline text-sm text-blue-600 hover:text-blue-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
            @endif

            <!--
              CORREÇÃO DE COR E TEXTO:
              Botão de Login estilizado com azul (sobrescrevendo o padrão do x-primary-button).
            -->
            <x-primary-button class="ms-3 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 focus:ring-blue-500">
                Entrar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
