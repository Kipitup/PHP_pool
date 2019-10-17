#!/usr/bin/php
<?php
if ($argc >= 2) {
	$result = preg_replace('/^[ \t]+|[ \t]+$|[ \t]+(?=[ \t\n])/', '', $argv[1]);
	print("$result\n");
}
?>
