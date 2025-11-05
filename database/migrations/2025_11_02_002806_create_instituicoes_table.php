<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cnpj', 18)->unique();
            $table->string('telefone', 15); // aqui vou utlizar o modelo que pegue telefone estrangeiro
            $table->string('email', 100)->unique();
            $table->text('endereco')->nullable();
            $table->text('sobre')->nullable();
            $table->string('categoria', 50)->default('outros');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituicoes');
    }
};
