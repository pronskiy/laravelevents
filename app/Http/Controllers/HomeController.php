<?php

namespace App\Http\Controllers;

use App\Item;

class HomeController extends Controller
{
    public function index()
    {
        return view(
            'home',
            ['items' => Item::future()->simplePaginate(20)]
        );
    }

    public function testAction()
    {

    }
}

