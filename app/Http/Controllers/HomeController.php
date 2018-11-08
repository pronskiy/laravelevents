<?php

NAMESPACE App\Http\Controllers;

USE App\Item;

class HomeController
    extends Controller
{
    function index() {
        return view(
            'home', [ 'items' => Item::future(   )->simplePaginate(20)] );


    }}
