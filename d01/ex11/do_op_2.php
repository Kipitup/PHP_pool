#!/usr/bin/php
<?php
if ($argc == 2) {
	$tmp = trim($argv[1]);
	$tab = preg_split("~[+-/%*]~", $tmp);

	$nb1 = trim($tab[0]);
	$nb2 = trim($tab[1]);
	if (is_numeric($nb1) === false || is_numeric($nb2) === false)
	{
		echo "Syntax Error\n";
		return ;
	}
	if (strpos($tmp, "+") !== false) {
		$ret = $nb1 + $nb2;
	}
	else if (strpos($tmp, '-') !== false) {
		$ret = $nb1 - $nb2;
	}
	else if (strpos($tmp, '*') !== false) {
		$ret = $nb1 * $nb2;
	}
	else if (strpos($tmp, '/') !== false) {
		$ret = $nb1 / $nb2;
	}
	else if (strpos($tmp, '%') !== false) {
		$ret = $nb1 % $nb2;
	}
	else {
		echo "Syntax Error\n";
		return ;
	}
	echo "$ret\n";
}
else
	echo "Incorrect Parameters\n";
?>
