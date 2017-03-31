<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function tags(){
    	return $this->belongsToMany( \App\Models\Tag::class );
    }
}
