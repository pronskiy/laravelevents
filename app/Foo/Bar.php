<?php

namespace App\Foo;

class Bar
{
    const RANDOM_BYTES_COUNT = 10;

    private $foo;

    function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function methodFoo()
    {
        $this->foo->makeItHappen();
    }

    /**
     * @throws \Exception
     */
    public function methodBar() : string
    {
        return random_bytes(self::RANDOM_BYTES_COUNT);
    }
}
