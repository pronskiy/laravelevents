<?php

class usedClass
{
    public function firstMethod()
    {
    }

    public function secondMethod()
    {
    }
}

class unusedChildClass extends usedClass
{
    public function secondMethod()
    {
    }
}

(new usedClass())->secondMethod();







class Car
{
    private $engine;
    private $wheels;

    public function __construct(
        Engine $engine,
        array $wheels
    ) {
        $this->engine = $engine;
        $this->wheels = $wheels;
    }

    public function drive()
    {
        $this->engine->connectTo($this->wheels);
        $this->engine->start();
        $this->engine->accelerate();
    }
}

new Car(new Engine(), []);


class Engine
{
    public function connectTo(array $wheels){}
    public function start(){}
    public function accelerate(){}

}
