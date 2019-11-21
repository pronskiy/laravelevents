<?php /** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpUnused */

namespace App;


class User1
{


    private StdClass $field;

    public function __construct(StdClass $field)
    {
        $this->field = $field;
    }


}



class ExceptionalClass
{
    /**
     * @throws \Exception
     */
    public function throwing()
    {
        throw new \Exception();
    }

    public function run()
    {
        $this->throwing();
    }
}



class Test
{
    public int $a = [];
}

$t = new Test;
$t->a = [];


class Engine {}



        class Car
        {
            /** @var Engine */
            public Engine $engine;
        }

        $foo = new Car();
        $foo->engine = new Car();







        class User
        {
            private int $id;
            private string $name = '';

            /** @var self */
            private User $parent;

            public function __construct(int $id, $name, $parent)
            {
                $this->id = $id;
                $this->name = $name;
                $this->parent = $parent;
            }
        }
