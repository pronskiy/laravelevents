<?php declare(strict_types=1);


namespace Vendor\Package {

    // Brace on the same line
    $instance = new class extends \Foo implements \HandleableInterface {
        // Class content
    };

// Brace on the next line
    $instance = new class extends \Foo implements
        \ArrayAccess,
        \Countable,
        \Serializable {
        // Class content
    };

    function functionA()
    {
        $input = '123';
        $intValue = (int   )$input;
    }

    ;
    function functionB()
    {
    }

    ;
    function functionC()
    {
    }

    ;

    const ConstantA = 'ConstantA';
    const ConstantB = 'ConstantA';
    const ConstantC = 'ConstantA';

    interface FooInterface
    {
    }

    ;

    class Bar
    {
        public function bar($arg)
        {
        }
    }
}

namespace Vendor\Package\SomeNamespace {

    class ClassD
    {
    }
}


namespace Vendor\Package\SomeNamespace\SubnamespaceOne\AnotherNamespace {

    class ClassA
    {
        public int$prop = 42;
    }
}

namespace Vendor\Package\SomeNamespace\SubnamespaceOne {

    class ClassB
    {
    }
}

namespace Vendor\Package\SomeNamespace {

    class ClassZ
    {
        public function test()
        {
            $foo = true;
            $variable = $foo ? 'foo' : 'bar';
            $variable = $foo ?: 'bar';
        }
    }
}

/*
use Vendor\Package\SomeNamespace\ClassD as D;
use function Vendor\Package\{functionA, functionB, functionC};
use const Vendor\Package\{ConstantA, ConstantB, ConstantC};
*/

