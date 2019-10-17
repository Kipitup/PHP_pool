#!/usr/bin/php
<?php
function grab_image($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
}

$file = file_get_contents($argv[1]);
$url = preg_replace("~http://~", "https://", $argv[1]);
$folder = preg_replace("~(https://)~", "", $url);
mkdir ($folder);
preg_match_all("/<img (.*?)>/", $file, $matches);
$imgs = ($matches[1]);
foreach ($imgs as $elem)
{
	$elem = preg_replace("~.*src=\"|\".*~", "", $elem);
	$saveto = preg_replace("~.*/~", "", $elem);
	$saveto = $folder."/".$saveto;
	if (preg_match("~^(htt.*?://)~", $elem) === 0)
		$elem = $url.$elem;
	grab_image($elem, $saveto);
}
?>
