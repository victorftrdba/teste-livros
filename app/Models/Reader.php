<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Reader extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'readers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birthday',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
