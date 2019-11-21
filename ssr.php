<?php

namespace SSR;

class A {
    public function foo(B $c) {}
}

class B {
    public function foo(B $c) {}
}

class C extends B {}

$a = new A;
$b = new B;

$a->foo(new B);
$a->foo(new C);
$b->foo(new C);
