<?php
session_start();
$link = mysqli_connect("127.0.0.1", "root", "mdeltour", "db_shop");
if (!$link)
{
	$link = mysqli_connect("127.0.0.1", "root", "amartino", "db_shop");
	if (!$link)
	{
		echo "Erreur : Impossible de se connecter à MySQLI." . PHP_EOL;
	    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
	    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
		die();
	}
}
?>
