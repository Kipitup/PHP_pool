<?php
$filename = "../private/passwd";
if ($_POST[login] == "" || $_POST[passwd] == "" || $_POST[submit] !== "OK") {
	echo "ERROR\n";
	exit ;
}
if (file_exists("../private") === false)
	mkdir('../private');
if (file_exists($filename) === true) {
	$file_content = file_get_contents($filename);
	$database = unserialize($file_content);
	foreach ($database as $value) {
		if ($value['login'] === $_POST['login']) {
			echo "ERROR\n";
			exit ;
		}
	}
}
$content['login'] = $_POST['login'];
$content['passwd'] = hash("whirlpool", $_POST['passwd']);
$database[] = $content;
$passwd_str = serialize($database);
file_put_contents($filename, $passwd_str);
echo "OK\n";
?>
