<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'cpf',
        'data_nascimento',
        'endereco',
        'doador_frequente'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'data_nascimento' => 'date',
            'doador_frequente' => 'boolean',
        ];
    }

    public function doacoes()
    {
        return $this->hasMany(Doacao::class, 'doador_id');
    }

    public function instituicao()
    {
        return $this->hasOne(Instituicao::class, 'responsavel_id');
    }
}
