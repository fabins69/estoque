<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = [
        'id_produto',
        'id_cliente',
        'quantidade',
    ];
}
