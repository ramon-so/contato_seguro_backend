<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone', 'data_de_nascimento', 'cidade_onde_nasceu'
    ];

    protected $table = 'usuarios';
}
