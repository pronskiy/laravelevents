--TEST--
curl_init() - creates a resource
--SKIPIF--
<?php if(!extension_loaded('curl')) die('skip ext/curl required');  ?>
--FILE--
<?php
$ch = curl_init();
var_dump(is_resource($ch));
curl_close($ch);
?>
--EXPECT--
bool(true)
