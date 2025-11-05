@extends('layouts.app')

@section('title', 'Minhas Doações')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Minhas Doações</h1>
        <p class="text-gray-600">Aqui você pode acompanhar todas as suas doações</p>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Instituição</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($doacoes as $doacao)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $doacao->item->nome }}</div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ $doacao->item->descricao }}</div>
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
                                <a href="{{ route('doacoes.show', $doacao) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i> Detalhes
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                Você ainda não realizou nenhuma doação.
                                <a href="{{ route('doacoes.create') }}" class="text-purple-600 hover:text-purple-900 ml-1">
                                    Faça sua primeira doação!
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($doacoes->count() > 0)
        <div class="mt-6 bg-blue-50 p-4 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-heart text-blue-500 text-xl mr-3"></i>
                <div>
                    <h3 class="font-semibold text-blue-800">Obrigado por suas doações!</h3>
                    <p class="text-blue-600 text-sm">Você já realizou <strong>{{ $doacoes->count() }}</strong> doações e
                        está ajudando a transformar vidas.</p>
                </div>
            </div>
        </div>
    @endif
@endsection
