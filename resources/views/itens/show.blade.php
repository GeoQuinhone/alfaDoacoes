@extends('layouts.app')

@section('title', $item->nome)

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $item->nome }}</h1>
                    <div class="flex items-center mt-2 space-x-4">
                        <span class="px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ $item->categoria }}
                        </span>
                        @if ($item->urgente)
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-exclamation-triangle mr-1"></i> URGENTE
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('itens.edit', $item) }}"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('itens.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>

            <!-- Informações -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Descrição</h3>
                        <p class="text-lg text-gray-900">{{ $item->descricao ?? 'Sem descrição' }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Instituição</h3>
                        <p class="text-lg text-gray-900">{{ $item->instituicao->nome }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Data de Cadastro</h3>
                        <p class="text-lg text-gray-900">{{ $item->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Progresso -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Progresso da Meta</h3>
                        @php
                            $percentual =
                                $item->quantidade_necessaria > 0
                                    ? ($item->quantidade_disponivel / $item->quantidade_necessaria) * 100
                                    : 0;
                            $percentual = min($percentual, 100);
                        @endphp
                        <div class="w-full bg-gray-200 rounded-full h-4">
                            <div class="bg-green-600 h-4 rounded-full" style="width: {{ $percentual }}%"></div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600 mt-1">
                            <span>{{ $item->quantidade_disponivel }} disponíveis</span>
                            <span>{{ $item->quantidade_necessaria }} necessários</span>
                        </div>
                    </div>

                    <!-- Quantidades -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-green-600">{{ $item->quantidade_disponivel }}</p>
                            <p class="text-sm text-gray-600">Disponível</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg text-center">
                            <p class="text-2xl font-bold text-blue-600">{{ $item->quantidade_necessaria }}</p>
                            <p class="text-sm text-gray-600">Necessário</p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="text-center">
                        @if ($item->quantidade_disponivel >= $item->quantidade_necessaria)
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Meta Atingida
                            </span>
                        @elseif($item->urgente)
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-exclamation-triangle mr-1"></i> Necessidade Urgente
                            </span>
                        @else
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i> Em Andamento
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Doações Relacionadas -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Doações Recebidas</h3>
                @if ($item->doacoes->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Doador</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Quantidade
                                    </th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($item->doacoes as $doacao)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $doacao->doador->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">{{ $doacao->quantidade }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-900">
                                            {{ $doacao->data_doacao->format('d/m/Y') }}</td>
                                        <td class="px-4 py-2">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $doacao->status == 'entregue'
                                            ? 'bg-green-100 text-green-800'
                                            : ($doacao->status == 'pendente'
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : 'bg-blue-100 text-blue-800') }}">
                                                {{ ucfirst($doacao->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">Nenhuma doação recebida para este item ainda.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
