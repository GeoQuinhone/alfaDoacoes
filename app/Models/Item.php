<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'itens';

    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'quantidade_disponivel',
        'quantidade_necessaria',
        'urgente',
        'instituicao_id'
    ];

    protected $casts = [
        'urgente' => 'boolean',
    ];

    // Relação: Um item pertence a uma instituição
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }

    // Relação: Um item pode ter muitas doações
    public function doacoes()
    {
        return $this->hasMany(Doacao::class);
    }
}
