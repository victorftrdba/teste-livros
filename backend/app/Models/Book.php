<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'books';
    /**
     * @var string[]
     */
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

    /**
     * @return \Jenssegers\Mongodb\Relations\EmbedsMany
     */
    public function readers()
    {
        return $this->embedsMany(Reader::class);
    }
}
