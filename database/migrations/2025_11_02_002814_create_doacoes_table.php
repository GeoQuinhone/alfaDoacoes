<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('itens')->onDelete('cascade');
            $table->foreignId('doador_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('instituicao_id')->constrained('instituicoes')->onDelete('cascade');
            $table->integer('quantidade');
            $table->date('data_doacao');
            $table->enum('status', ['pendente', 'confirmada', 'entregue', 'cancelada'])->default('pendente');
            $table->enum('tipo', ['material', 'financeiro', 'voluntariado'])->default('material');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doacoes');
    }
};
