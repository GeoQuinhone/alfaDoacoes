@extends('layouts.app')

@section('title', 'Novo Item')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Cadastrar Novo Item</h1>
                <a href="{{ route('itens.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2"></i> Voltar
                </a>
            </div>

            <form action="{{ route('itens.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Item *</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Ex: Arroz, Fraldas, Cobertores..." required>
                        @error('nome')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Descreva o item...">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria *</label>
                        <select name="categoria" id="categoria"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            required>
                            <option value="">Selecione uma categoria</option>
                            <option value="alimentos" {{ old('categoria') == 'alimentos' ? 'selected' : '' }}>Alimentos
                            </option>
                            <option value="roupas" {{ old('categoria') == 'roupas' ? 'selected' : '' }}>Roupas</option>
                            <option value="higiene" {{ old('categoria') == 'higiene' ? 'selected' : '' }}>Higiene Pessoal
                            </option>
                            <option value="medicamentos" {{ old('categoria') == 'medicamentos' ? 'selected' : '' }}>
                                Medicamentos</option>
                            <option value="brinquedos" {{ old('categoria') == 'brinquedos' ? 'selected' : '' }}>Brinquedos
                            </option>
                            <option value="moveis" {{ old('categoria') == 'moveis' ? 'selected' : '' }}>Móveis</option>
                            <option value="eletronicos" {{ old('categoria') == 'eletronicos' ? 'selected' : '' }}>
                                Eletrônicos</option>
                            <option value="outros" {{ old('categoria') == 'outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                        @error('categoria')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="instituicao_id" class="block text-sm font-medium text-gray-700">Instituição *</label>
                        <select name="instituicao_id" id="instituicao_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            required>
                            <option value="">Selecione uma instituição</option>
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

                    <div>
                        <label for="quantidade_disponivel" class="block text-sm font-medium text-gray-700">Quantidade
                            Disponível *</label>
                        <input type="number" name="quantidade_disponivel" id="quantidade_disponivel"
                            value="{{ old('quantidade_disponivel', 0) }}" min="0"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            required>
                        @error('quantidade_disponivel')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="quantidade_necessaria" class="block text-sm font-medium text-gray-700">Quantidade
                            Necessária *</label>
                        <input type="number" name="quantidade_necessaria" id="quantidade_necessaria"
                            value="{{ old('quantidade_necessaria', 0) }}" min="0"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500"
                            required>
                        @error('quantidade_necessaria')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="urgente" id="urgente" value="1"
                                {{ old('urgente') ? 'checked' : '' }}
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <label for="urgente" class="ml-2 block text-sm text-gray-700">
                                <span class="font-medium text-red-600">Item Urgente</span> - Marque se este item é de
                                extrema necessidade
                            </label>
                        </div>
                        @error('urgente')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-lg transition">
                        <i class="fas fa-save mr-2"></i> Cadastrar Item
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
