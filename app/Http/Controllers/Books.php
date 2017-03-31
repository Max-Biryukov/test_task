<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Book;
use \App\Models\Tag;

class Books extends Controller
{
    public function getIndex()
    {
    	return view( 'books.list', [
    		'books' => Book::select([ 'id', 'name', 'url', 'subhead' ])->get(),
    		'tags' => Tag::select([ 'id', 'name' ])->orderBy( 'name' )->get(),
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

    public function getByTag( $id )
    {

        if( empty($id) || !$tag = Tag::with( 'books' )->whereId( (int)$id )->first() ){
        	abort( 404 );
        }

    	return view( 'books.byTags', [
    	    'tag' => $tag,
    	]);
    }

}
