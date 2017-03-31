<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Book;
use \App\Models\WishList;

class WishLists extends Controller
{
    public function __construct()
    {
      //При работе со списком пожеланий требуем авторизацию
      $this->middleware('auth');
    }

    public function getAdd( $id )
    {
        if( empty($id) || !$book = Book::find( $id ) ){
            abort( 404 );
        }

        if( $book->on_offer == 1 ){
            return redirect()->back()->with( 'warning', 'Данная книга уже поступила в продажу. Вы можете добавить ее в корзину' );
        }

        $user = \Auth::user();

        if( in_array( $book->id, $user->wish_list()->pluck( 'book_id' )->toArray() ) ){
            return redirect()->back()->with( 'warning', 'Данная книга уже в списке пожеланий' );
        }

        if( WishList::Create([
                'user_id' => $user->id,
                'book_id' => $book->id,
             ])
        ){
            return redirect()->back()->with( 'message', 'Книга "' . $book->name . '" добавлена в список пожеланий' );
        }

        return redirect()->back()->with( 'warning', 'При добавлении в список пожеланий произошла ошибка' );
    }

    public function getRemove( $id )
    {
        $user = \Auth::user();
        if( empty($id) || !$wish_list_element = WishList::whereBookId( (int)$id )->whereUserId( $user->id )->first() ){
            abort( 404 );
        }
        
        $wish_list_element->delete();
        
        return redirect()->back()->with( 'message', 'Книга удалена из списка пожеланий' );

    }    
    
    public function getIndex()
    {
           return view( 'wish_list.index', []);
    }
}
