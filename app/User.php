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
        return $this->belongsToMany( \App\Models\Book::class, 'baskets', 'user_id', 'book_id' );
    }

    public function wish_list()
    {
        return $this->belongsToMany( \App\Models\Book::class, 'wish_lists', 'user_id', 'book_id' );
    }    
    
}
