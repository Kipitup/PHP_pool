#!/usr/bin/php
<?php
print_r($argv);
print($argc);

$tab = array();
for ($i = 1; $i < $argc; $i++) {
	$str = trim($argv[$i]);
	$tmp = preg_split("/[ ]+/", $str);
	$tab = array_merge($tab, $tmp);
}
sort($tab);
$count = count($tab);
for ($i = 0; $i < $count; $i++)
	print("$tab[$i]\n");
?>
