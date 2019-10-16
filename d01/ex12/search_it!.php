#!/usr/bin/php
<?php
if ($argc < 2)
	return ;
$ret = null;
array_shift($argv);
$key = array_shift($argv);
foreach ($argv as $value) {
	$tab = explode(":", $value);
	if (count($tab) == 2 && $tab[0] == $key) {
		$ret = $tab[1];
	}
}
if ($ret != null)
	echo "$ret\n";
?>
