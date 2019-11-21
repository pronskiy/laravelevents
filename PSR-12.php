<?php

declare( strict_types=1 );

namespace Vendor\Package;

use Vendor\Package\SomeNamespace\{
    SubnamespaceOne\AnotherNamespace\ClassA,
    SubnamespaceOne\ClassB,
    ClassZ,
};

class Foo extends Bar {
    public function sampleFunction(int $a , int $b = NULL, & ... $parts)
    :array
    {
        $foo = new Foo;

        $b ++;
        if ($a===$b) {
            bar();
        } elseif ($a > $b) {
            $foo->bar($parts);
        } else {
            Foo::baz($a, $b);
        }

        return [$a, $b, ...$parts];
    }

    final public static function baz($arg2, $arg3)
    {
        // method body
    }
}

