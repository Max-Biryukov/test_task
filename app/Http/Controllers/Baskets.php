<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Book;
use \App\Models\Basket;

class Baskets extends Controller
{
	public function __construct()
	{
	  //При работе с корзиной требуем авторизацию
	  $this->middleware('auth');
	}

    public function getAdd( $id )
    {
        if( empty($id) || !$book = Book::find( $id ) ){
        	abort( 404 );
        }

        if( $book->on_offer == 0 ){
        	return redirect()->back()->with( 'warning', 'Данная книга еще не поступила в продажу. Ее нельзя положить в корзину' );
        }

        $user = \Auth::user();

        if( in_array( $book->id, $user->basket()->pluck( 'book_id' )->toArray() ) ){
        	return redirect()->back()->with( 'warning', 'Данная книга уже в корзине' );
        }

        if( Basket::Create([
                'user_id' => $user->id,
                'book_id' => $book->id,
             ])
        ){
        	return redirect()->back()->with( 'message', 'Книга "' . $book->name . '" добавлена в корзину' );
        }

        return redirect()->back()->with( 'warning', 'При добавлении в корзину произошла ошибка' );
    }

    public function getRemove( $id )
    {
        $user = \Auth::user();
        if( empty($id) || !$basket_element = Basket::whereBookId( (int)$id )->whereUserId( $user->id )->first()->delete() ){
            abort( 404 );
        }

        return redirect()->back()->with( 'message', 'Книга удалена из корзины' );

    }    
    
    public function getIndex()
    {
	   	return view( 'basket.index', []);
    }

}
