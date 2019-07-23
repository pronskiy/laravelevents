--TEST--
Test filter_input() with GET data.
--DESCRIPTION--
This test covers both valid and invalid usages of filter_input() with INPUT_GET data.
--SK
<?php if (!extension_loaded("filter")) die("Skipped: filter extension required."); ?>
--GET--
a=<b>test</b>&b=https://example.com
--FILE--
<?php
var_dump(filter_input(INPUT_GET, "a", FILTER_SANITIZE_STRIPPED));
var_dump(filter_input(INPUT_GET, "b", FILTER_VALIDATE_FLOAT, new stdClass));
var_dump(filter_var("", "", "", "", ""));
echo "Done\n";
?>
--EXPECT--
string(4) "test"

Notice: Object of class stdClass could not be converted to int in %ssample001.php on line %d
bool(false)

Warning: filter_var() expects at most 3 parameters, 5 given in %ssample001.php on line %d
NULL
Done
