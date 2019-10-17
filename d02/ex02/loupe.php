#!/usr/bin/php
<?php
function upper($matches) {
	return (strtoupper($matches[0]));
}

function upper_for_title($matches) {
	return (preg_replace_callback('/".*"/', 'upper', $matches[0]));
}

$file = file_get_contents("./page.html");
$tab = preg_split("~(<a href=.*>)~", $file,  -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
foreach ($tab as $key => $value) {
	if (preg_match("/^<a/", $value) === 1) {
		$value = preg_replace_callback('/title=".*"/i', 'upper_for_title', $value);
		$value = preg_replace_callback("/>(.*?)</", 'upper', $value);
		echo "$value";
	}
	else
		echo "$value";
}
?>
