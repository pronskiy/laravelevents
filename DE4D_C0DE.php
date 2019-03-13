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

/**
 * @return usedClass[]
 */
function test()
{
    return [new usedClass(), new usedClass()];
}

foreach (test() as $usedClass) {
    $usedClass->firstMethod();
}
