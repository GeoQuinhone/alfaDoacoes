<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('descricao', 500)->nullable();
            $table->string('categoria', 50)->default('outros');
            $table->integer('quantidade_disponivel')->default(0);
            $table->integer('quantidade_necessaria')->default(0);
            $table->boolean('urgente')->default(false);
            $table->foreignId('instituicao_id')->constrained('instituicoes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
