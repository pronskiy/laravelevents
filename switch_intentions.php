<?php
$i = '';

switch ($i) {
    case "apple":
        echo "i is apple";
        break;
    case "bar":
        echo "i is bar";
        break;
    default:
        throw new \Exception('Unexpected value');
}






