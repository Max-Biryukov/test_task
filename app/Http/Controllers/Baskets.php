<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Baskets extends Controller
{
	public function __construct()
	{
	  //При работе с корзиной требуем авторизацию
	  $this->middleware('auth');
	}

    public function getAdd( $id )
    {
        echo( $id );
    }
}
