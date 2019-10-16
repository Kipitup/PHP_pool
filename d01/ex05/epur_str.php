#!/usr/bin/php
<?php
if ($argc == 2) {
	$result = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $argv[1]);
	print("$result\n");
}
?>
