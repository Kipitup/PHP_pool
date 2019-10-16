#!/usr/bin/php
<?php
if ($argc >= 2) {
	$input = trim($argv[1]);
	$tab = preg_split("/[ ]+/", $input);
	$count = count($tab);
	for ($i = 1; $i < $count; $i++)
		print("$tab[$i] ");
	print("$tab[0]\n");
}
?>
