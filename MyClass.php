<?php

namespace App;

class MyClass
{
    protected PDO $pdo;

    public function setPDO($pdo){
        $this->pdo = $pdo;
    }
}
