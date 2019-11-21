
    <?php

    class PHP {}

    if (!class_exists('InjectablePHP')) {

        eval('class InjectablePHP extends PHP { }');

    }


    echo <<<'PHP'
            class User {
                public int $id;
                public string $name;

                public function __construct(int $id,string $name)
                {
                    $this->id=$id;
                    $this->name=$name;
                }
            }
    PHP;






    $stringWithPHPCode = /** @lang InjectablePHP */ "echo 'InjectablePHP';";
