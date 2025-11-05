<?php

use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('instituicoes', InstituicaoController::class);
    Route::resource('itens', ItemController::class);
    Route::resource('doacoes', DoacaoController::class)
         ->parameters(['doacoes' => 'doacao']);
    Route::get('/minhas-doacoes', [DoacaoController::class, 'minhasDoacoes'])->name('doacoes.minhas');
});

require __DIR__ . '/auth.php';
