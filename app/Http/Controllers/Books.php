<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Book;

class Books extends Controller
{
    public function getIndex()
    {
    	return view( 'books.list', [
    		'books' => Book::select([ 'name', 'url' ])->get()
    	]);
    }

    public function getDetail( $url )
    {
        if( empty($url) || !$book = Book::whereUrl( $url )->first() ){
        	abort( 404 );
        }

    	return view( 'books.detail', [
    		'book' => $book
    	]);
    }

}