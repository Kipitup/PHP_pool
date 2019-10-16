#!/usr/bin/php
<?php
$tab = array();
$alpha = array();
$num = array();
$not_alnum = array();
for ($i = 1; $i < $argc; $i++) {
	$str = trim($argv[$i]);
	$tmp = preg_split("/[\s]+/", $str);
	$tab = array_merge($tab, $tmp);
}
$count = count($tab);
for ($i = 0; $i < $count; $i++) {
	if (ctype_alpha($tab[$i][0]) === true) {
		array_push($alpha, $tab[$i]);
	}
}
for ($i = 0; $i < $count; $i++) {
	if (is_numeric($tab[$i][0]) === true) {
		array_push($num, $tab[$i]);
	}
}
for ($i = 0; $i < $count; $i++) {
	if (ctype_alnum($tab[$i][0]) === false) {
		array_push($not_alnum, $tab[$i]);
	}
}
sort($alpha, SORT_STRING | SORT_FLAG_CASE);
sort($num, SORT_STRING);
sort($not_alnum);
$count = count($alpha);
for ($i = 0; $i < $count; $i++)
	print("$alpha[$i]\n");

$count = count($num);
for ($i = 0; $i < $count; $i++)
	print("$num[$i]\n");

$count = count($not_alnum);
for ($i = 0; $i < $count; $i++)
	print("$not_alnum[$i]\n");
?>
