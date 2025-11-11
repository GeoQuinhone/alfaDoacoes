@extends('layouts.app')

@section('title', 'Nova Instituição')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Cadastrar Nova Instituição</h1>
                <a href="{{ route('instituicoes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2"></i> Voltar
                </a>
            </div>

            <form action="{{ route('instituicoes.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Instituição *</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('nome')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ *</label>
                        <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="00.000.000/0000-00" required>
                        @error('cnpj')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone *</label>
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="(11) 99999-9999" required>
                        @error('telefone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria *</label>
                        <select name="categoria" id="categoria"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Selecione uma categoria</option>
                            <option value="animais" {{ old('categoria') == 'animais' ? 'selected' : '' }}>Proteção Animal
                            </option>
                            <option value="criancas" {{ old('categoria') == 'criancas' ? 'selected' : '' }}>Crianças
                            </option>
                            <option value="idosos" {{ old('categoria') == 'idosos' ? 'selected' : '' }}>Idosos</option>
                            <option value="ambiental" {{ old('categoria') == 'ambiental' ? 'selected' : '' }}>Meio Ambiente
                            </option>
                            <option value="educacao" {{ old('categoria') == 'educacao' ? 'selected' : '' }}>Educação
                            </option>
                            <option value="saude" {{ old('categoria') == 'saude' ? 'selected' : '' }}>Saúde</option>
                            <option value="outros" {{ old('categoria') == 'outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                        @error('categoria')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <textarea name="endereco" id="endereco" rows="2"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('endereco') }}</textarea>
                        @error('endereco')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="sobre" class="block text-sm font-medium text-gray-700">Sobre a Instituição</label>
                        <textarea name="sobre" id="sobre" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('sobre') }}</textarea>
                        @error('sobre')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg transition">
                        <i class="fas fa-save mr-2"></i> Cadastrar Instituição
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
