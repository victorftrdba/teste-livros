<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Leitor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'leitores';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'aniversario',
    ];
}
