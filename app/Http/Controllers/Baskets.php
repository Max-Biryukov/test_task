<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Baskets extends Controller
{
	public function __construct()
	{
	  //��� ������ � �������� ������� �����������
	  $this->middleware('auth');
	}

    public function getAdd( $id )
    {
        echo( $id );
    }
}
