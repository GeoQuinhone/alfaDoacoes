@extends('layouts.app')

@section('title', 'Doações')

@section('content')
    <!-- Certifique-se de incluir a biblioteca Font Awesome no seu layout, se ainda não o fez. -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Todas as Doações</h1>
        <a href="{{ route('doacoes.create') }}"
            class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-4 rounded-lg transition">
            <i class="fas fa-plus mr-2"></i> Nova Doação
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doador
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Instituição</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantidade</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Usando a função Auth::user() para garantir que o usuário está logado --}}
                    @php
                        $userId = Auth::check() ? Auth::id() : null;
                    @endphp

                    @forelse($doacoes as $doacao)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $doacao->item->nome }}</div>
                                {{-- A linha abaixo estava incorreta, você estava tentando acessar $doacao->item->instituicao->nome, mas a doação já tem sua própria instituição --}}
                                <div class="text-sm text-gray-500">
                                    {{-- Se o item também tiver relação com instituição, mantenha, caso contrário, remova ou corrija. --}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $doacao->doador->name }}
                                {{-- Adiciona um rótulo para o próprio usuário --}}
                                @if ($userId && $doacao->doador_id === $userId)
                                    <span
                                        class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">Seu</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $doacao->instituicao->nome }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="font-semibold">{{ $doacao->quantidade }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $doacao->data_doacao->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $doacao->tipo == 'material'
                                    ? 'bg-blue-100 text-blue-800'
                                    : ($doacao->tipo == 'financeiro'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($doacao->tipo) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $doacao->status == 'entregue'
                                    ? 'bg-green-100 text-green-800'
                                    : ($doacao->status == 'confirmada'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($doacao->status == 'pendente'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-red-100 text-red-800')) }}">
                                    {{ ucfirst($doacao->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{-- Link para Visualizar (sempre visível) --}}
                                <a href="{{ route('doacoes.show', $doacao) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- *** VERIFICAÇÃO CRÍTICA APLICADA AQUI: *** --}}
                                @if ($userId && $doacao->doador_id === $userId)
                                    {{-- Link para Editar --}}
                                    <a href="{{ route('doacoes.edit', $doacao) }}"
                                        class="text-green-600 hover:text-green-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Formulário para Excluir --}}
                                    <form action="{{ route('doacoes.destroy', $doacao) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- IMPORTANTE: Substituído o 'confirm()' por um aviso de interface, conforme boas práticas. --}}
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            data-confirm-delete="true" data-doacao-id="{{ $doacao->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    {{-- Placeholder para alinhar o layout quando as ações não estão disponíveis --}}
                                    <span class="text-gray-400">
                                        <i class="fas fa-lock ml-2" title="Apenas o doador pode editar/excluir"></i>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500">
                                Nenhuma doação cadastrada.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Script para Modal de Confirmação de Exclusão (Substituindo alert()/confirm()) --}}
    <div id="delete-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-96">
            <h2 class="text-xl font-bold mb-4 text-red-600">Confirmação de Exclusão</h2>
            <p class="mb-6">Tem certeza que deseja excluir esta doação? Esta ação não pode ser desfeita.</p>
            <div class="flex justify-end space-x-3">
                <button id="cancel-delete"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Cancelar
                </button>
                <button id="confirm-delete-btn"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Excluir Permanentemente
                </button>
            </div>
        </div>
    </div>
@endsection
