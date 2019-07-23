<?php

namespace App;

class Engine {}

class Car
{
    public Engine $engine;
}

$foo = new Car;
$foo->engine = new Car;
