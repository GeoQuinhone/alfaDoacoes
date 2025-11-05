<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
     use HasFactory;

    // Especificar o nome correto da tabela
    protected $table = 'instituicoes';

    protected $fillable = [
        'nome',
        'cnpj',
        'telefone',
        'email',
        'endereco',
        'sobre',
        'categoria',
        'ativo'
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    // Relação: Uma instituição tem muitos itens
    public function itens()
    {
        return $this->hasMany(Item::class);
    }

    // Relação: Uma instituição tem muitas doações
    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }

    // Relação: Uma instituição tem um responsável (usuário)
    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }
}
