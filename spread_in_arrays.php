<?php







$parts = ['apple', 'pear'];
$notParts = 42;
$fruits = ['banana', 'orange', $parts, 'watermelon'];

$fruits = ['banana', 'orange', ...&$parts, 'watermelon'];



$fruits = ['banana', 'orange', ...$notParts, 'watermelon'];
