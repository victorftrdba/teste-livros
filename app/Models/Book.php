<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'books';
    protected $fillable = [
        'name',
        'gender',
        'author',
        'year',
        'pages',
        'language',
        'edition',
        'editor',
        'isbn',
    ];

    public function readers()
    {
        return $this->embedsMany(Reader::class);
    }
}
