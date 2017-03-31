<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function basket()
    {
        return $this->hasManyThrough( \App\Models\Book::class, \App\Models\Basket::class, 'user_id', 'id' );
    	return $this->hasMany( \App\Models\Basket::class );
    }

}
