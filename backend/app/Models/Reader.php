<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Reader extends Eloquent implements Authenticatable
{
    use HasApiTokens, AuthenticatableTrait;

    protected $connection = 'mongodb';
    protected $collection = 'readers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birthday',
        'password',
    ];

    public function books()
    {
        return $this->embedsMany(Book::class);
    }
}
