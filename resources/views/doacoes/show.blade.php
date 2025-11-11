@extends('layouts.app')

@section('title', 'Doação #' . $doacao->id)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Doação #{{ $doacao->id }}</h1>
                    <div class="flex items-center mt-2 space-x-4">
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full
                        {{ $doacao->status == 'entregue'
                            ? 'bg-green-100 text-green-800'
                            : ($doacao->status == 'confirmada'
                                ? 'bg-blue-100 text-blue-800'
                                : ($doacao->status == 'pendente'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : 'bg-red-100 text-red-800')) }}">
                            {{ ucfirst($doacao->status) }}
                        </span>
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full
                        {{ $doacao->tipo == 'material'
                            ? 'bg-blue-100 text-blue-800'
                            : ($doacao->tipo == 'financeiro'
                                ? 'bg-green-100 text-green-800'
                                : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($doacao->tipo) }}
                        </span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('doacoes.edit', $doacao) }}"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('doacoes.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>

            <!-- Informações -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Item Doado</h3>
                        <p class="text-lg font-semibold text-gray-900">{{ $doacao->item->nome }}</p>
                        <p class="text-sm text-gray-600">{{ $doacao->item->descricao }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Doador</h3>
                        <p class="text-lg text-gray-900">{{ $doacao->doador->name }}</p>
                        <p class="text-sm text-gray-600">{{ $doacao->doador->email }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Instituição Beneficiada</h3>
                        <p class="text-lg text-gray-900">{{ $doacao->instituicao->nome }}</p>
                        <p class="text-sm text-gray-600">{{ $doacao->instituicao->categoria }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-purple-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-purple-600">{{ $doacao->quantidade }}</p>
                            <p class="text-sm text-gray-600">Quantidade</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-blue-600">{{ $doacao->data_doacao->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-600">Data</p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Data de Registro</h3>
                        <p class="text-lg text-gray-900">{{ $doacao->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    @if ($doacao->observacoes)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Observações</h3>
                            <p class="text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $doacao->observacoes }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
