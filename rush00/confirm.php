<?php
require_once('./sqli_connect.php');
include_once("./functions_bag.php");
$res = mysqli_query($link,'SELECT * FROM `articles`');
$res_cat = mysqli_query($link,'SELECT * FROM `category`');
$basket = array();
foreach ($_SESSION['panier'] as $key => $value) {
	if ($value != NULL)
	{
		$tmp = array(
			'id' => $key,
			'qtty' => $value['quantite'],
		);
		$basket[] = $tmp;
	}
}


$sql = "INSERT INTO `commandes` (`id`, `user_id`, `data_commande`) VALUES (NULL, '".intval($_SESSION['user_id'])."', '".json_encode($basket)."')";

$result = mysqli_query($link,$sql);
if($result === TRUE)
{
	header('Location: ./index.php?order=validate');
	die();
}
else
{
	header('Location: ./index.php?order=not_validate');
}
unset($_SESSION['panier']);

?>