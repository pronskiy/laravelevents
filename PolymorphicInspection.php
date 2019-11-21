<?php

class Animal {}

class Fish extends Animal
{
    public function fly()
    {
    }
}

function move(Animal $a)
{
    $a->fly();
}

move(new Animal());
