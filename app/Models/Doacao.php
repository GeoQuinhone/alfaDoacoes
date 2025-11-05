<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;
    protected $table = 'doacoes';

    protected $fillable = [
        'item_id',
        'doador_id',
        'instituicao_id',
        'quantidade',
        'data_doacao',
        'status',
        'tipo',
        'observacoes'
    ];

    protected $casts = [
        'data_doacao' => 'date',
        'quantidade' => 'integer',
    ];

    // Relação: Uma doação pertence a um item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relação: Uma doação pertence a um doador (usuário)
    public function doador()
    {
        return $this->belongsTo(User::class, 'doador_id');
    }

    // Relação: Uma doação pertence a uma instituição
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }
}
