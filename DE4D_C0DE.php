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
