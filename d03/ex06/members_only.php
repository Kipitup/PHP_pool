<?php
if ($_SERVER['HTTP_AUTHORIZATION'] === "Basic emF6OmphaW1lbGVzcGV0aXRzcG9uZXlz") {
	$img = file_get_contents('../img/42.png');
	echo "<html><body>\nBonjour Zaz<br />\n";
	echo "<img src='data:image/png;base64,".base64_encode($img)."'>\n";
	echo "</body></html>\n";
}
else {
	header('WWW-Authenticate: Basic realm="Espace membres"');
    header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
