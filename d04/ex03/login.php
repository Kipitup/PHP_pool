<?php
session_start();
include("auth.php");
if (auth($_GET[login], $_GET[passwd]) === true)
{
	$_SESSION[loggued_on_user] = $_GET[login];
	echo "OK\n";
}
else
{
	$_SESSION[loggued_on_user] = "";
	echo "ERROR\n";
}
?>
