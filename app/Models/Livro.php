<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Livro extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'livros';
    protected $fillable = [
        'nome',
        'genero',
        'autor',
        'ano',
        'paginas',
        'idioma',
        'edicao',
        'editora',
        'isbn',
    ];
}
