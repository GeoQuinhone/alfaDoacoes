@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600">Bem-vindo ao sistema de gerenciamento de doações da Alfa Doações</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card Instituições -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Instituições</p>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Instituicao::where('ativo', true)->count() }}
                    </p>
                </div>
                <i class="fas fa-building text-3xl text-blue-500"></i>
            </div>
        </div>

        <!-- Card Itens -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Itens Cadastrados</p>
                    <p class="text-2xl font-bold text-green-600">{{ \App\Models\Item::count() }}</p>
                </div>
                <i class="fas fa-box text-3xl text-green-500"></i>
            </div>
        </div>

        <!-- Card Doações -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600">Doações Realizadas</p>
                    <p class="text-2xl font-bold text-purple-600">{{ \App\Models\Doacao::count() }}</p>
                </div>
                <i class="fas fa-gift text-3xl text-purple-500"></i>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Ações Rápidas</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="{{ route('instituicoes.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-lg text-center transition">
                <i class="fas fa-plus mr-2"></i> Nova Instituição
            </a>
            <a href="{{ route('itens.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg text-center transition">
                <i class="fas fa-plus mr-2"></i> Novo Item
            </a>
            <a href="{{ route('doacoes.create') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white py-3 px-4 rounded-lg text-center transition">
                <i class="fas fa-plus mr-2"></i> Nova Doação
            </a>
            <a href="{{ route('doacoes.minhas') }}"
                class="bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-lg text-center transition">
                <i class="fas fa-heart mr-2"></i> Minhas Doações
            </a>
        </div>
    </div>
@endsection
