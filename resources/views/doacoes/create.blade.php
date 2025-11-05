@extends('layouts.app')

@section('title', 'Nova Doação')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Registrar Nova Doação</h1>
                <a href="{{ route('doacoes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2"></i> Voltar
                </a>
            </div>

            <form action="{{ route('doacoes.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Item -->
                    <div>
                        <label for="item_id" class="block text-sm font-medium text-gray-700">Item para Doação *</label>
                        <select name="item_id" id="item_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                            <option value="">Selecione um item</option>
                            @foreach ($itens as $item)
                                <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}
                                    data-instituicao="{{ $item->instituicao_id }}">
                                    {{ $item->nome }} - {{ $item->instituicao->nome }}
                                    @if ($item->urgente)
                                        (URGENTE)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('item_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instituição (auto-populado) -->
                    <div>
                        <label for="instituicao_id" class="block text-sm font-medium text-gray-700">Instituição *</label>
                        <select name="instituicao_id" id="instituicao_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                            <option value="">Selecione primeiro o item</option>
                            @foreach ($instituicoes as $instituicao)
                                <option value="{{ $instituicao->id }}"
                                    {{ old('instituicao_id') == $instituicao->id ? 'selected' : '' }}>
                                    {{ $instituicao->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('instituicao_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantidade -->
                    <div>
                        <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade *</label>
                        <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade', 1) }}"
                            min="1"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                        @error('quantidade')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Data da Doação -->
                    <div>
                        <label for="data_doacao" class="block text-sm font-medium text-gray-700">Data da Doação *</label>
                        <input type="date" name="data_doacao" id="data_doacao"
                            value="{{ old('data_doacao', date('Y-m-d')) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                        @error('data_doacao')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipo -->
                    <div>
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de Doação *</label>
                        <select name="tipo" id="tipo"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                            <option value="">Selecione o tipo</option>
                            <option value="material" {{ old('tipo') == 'material' ? 'selected' : '' }}>Material</option>
                            <option value="financeiro" {{ old('tipo') == 'financeiro' ? 'selected' : '' }}>Financeiro
                            </option>
                            <option value="voluntariado" {{ old('tipo') == 'voluntariado' ? 'selected' : '' }}>Voluntariado
                            </option>
                        </select>
                        @error('tipo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            required>
                            <option value="pendente" {{ old('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="confirmada" {{ old('status') == 'confirmada' ? 'selected' : '' }}>Confirmada
                            </option>
                            <option value="entregue" {{ old('status') == 'entregue' ? 'selected' : '' }}>Entregue</option>
                            <option value="cancelada" {{ old('status') == 'cancelada' ? 'selected' : '' }}>Cancelada
                            </option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Observações -->
                    <div class="md:col-span-2">
                        <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações</label>
                        <textarea name="observacoes" id="observacoes" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Alguma observação sobre a doação...">{{ old('observacoes') }}</textarea>
                        @error('observacoes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-purple-500 hover:bg-purple-600 text-white py-2 px-6 rounded-lg transition">
                        <i class="fas fa-hand-holding-heart mr-2"></i> Registrar Doação
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-popula instituição quando seleciona um item
        document.getElementById('item_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const instituicaoId = selectedOption.getAttribute('data-instituicao');

            if (instituicaoId) {
                document.getElementById('instituicao_id').value = instituicaoId;
            }
        });
    </script>
@endsection
