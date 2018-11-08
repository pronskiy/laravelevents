<?php

namespace App\Http\Controllers;

use  App\Item;

class HomeController
    extends Controller
{
    function index() {
        return view(
            'home', [ 'items' => Item::future( )->simplePaginate(20)] );
    }

    function api(){
        return Item::future()->get(  );


    }
}
