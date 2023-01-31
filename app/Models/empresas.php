<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    protected $fillable = [
        'nome', 'cnpj', 'endereco'
    ];

    protected $table = 'empresas';
}
