#!/usr/bin/php
<?php
if ($argc == 4) {
	$nb1 = trim($argv[1]);
	$op = trim($argv[2]);
	$nb2 = trim($argv[3]);
	if ($op === "+") {
		$ret = $nb1 + $nb2;
	}
	if ($op === "-") {
		$ret = $nb1 - $nb2;
	}
	if ($op === "*") {
		$ret = $nb1 * $nb2;
	}
	if ($op === "/") {
		$ret = $nb1 / $nb2;
	}
	if ($op === "%") {
		$ret = $nb1 % $nb2;
	}
	echo "$ret\n";
}
else
	echo "Incorrect Parameters\n";
?>
