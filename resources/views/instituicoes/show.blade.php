@extends('layouts.app')

@section('title', $instituicao->nome)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $instituicao->nome }}</h1>
                    <div class="flex items-center mt-2 space-x-4">
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full
                        {{ $instituicao->ativo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $instituicao->ativo ? 'Ativa' : 'Inativa' }}
                        </span>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $instituicao->categoria }}
                        </span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('instituicoes.edit', $instituicao) }}"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('instituicoes.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">CNPJ</h3>
                        <p class="text-lg text-gray-900">{{ $instituicao->cnpj }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Telefone</h3>
                        <p class="text-lg text-gray-900">{{ $instituicao->telefone }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p class="text-lg text-gray-900">{{ $instituicao->email }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Endereço</h3>
                        <p class="text-lg text-gray-900">{{ $instituicao->endereco ?? 'Não informado' }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Data de Cadastro</h3>
                        <p class="text-lg text-gray-900">{{ $instituicao->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            @if ($instituicao->sobre)
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Sobre a Instituição</h3>
                    <p class="text-gray-900 bg-gray-50 p-4 rounded-lg">{{ $instituicao->sobre }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
