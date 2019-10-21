<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Création du compte</title>
	<!-- Theme style -->
	<link rel="stylesheet" href="style.css">
</head>
<?php
require_once('./sqli_connect.php');
function display_register_form($errornum = 0)
{
	if ($errornum ==1)
	{
		echo 'Veuillez renseigner tous les champs afin de vous enregistrer <br /> ERREUR LORS DE L\'ENREGISTREMENT, VEUILLEZ REESSAYER<br />';
	}
	else
	{
		echo 'Veuillez renseigner tous les champs afin de vous enregistrer';
	}
	echo '	<form action="" method="POST">';
	echo '		Email: <input type="text" name="email" value="" />';
		echo '	<br />';
	echo '		Nom: <input type="text" name="last_name" value="" />';
	echo '		<br />';
		echo '	Prénom: <input type="text" name="first_name" value="" />';
	echo '		<br /> ';
	echo '		Mot de passe: <input type="password" name="password" value="" />';
	echo '		<br />';
	echo '		<input type="submit" name="submit" value="OK"/>';
	echo '		</form>';
	echo '	<a href="index.html">Retourner à la page d\'accueil</a>';
}

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['last_name']) && isset($_POST['first_name']))
{
	if($_POST['submit'] && $_POST['submit'] === "OK")
	{
		$postemail = htmlspecialchars($_POST['email'], ENT_QUOTES);
		$postlastname = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
		$postfirstname = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
		$res = mysqli_query($link,'SELECT * FROM `users` where `email` = "'.$postemail.'"');
		$result = mysqli_fetch_assoc($res);
		if ($result['email'] === $postemail)
		{
			display_register_form(1);
			die();
		}
		else
		{
			$sql = "INSERT INTO `users`(id, email, last_name, first_name, password, is_admin) VALUES (NULL, '".$postemail."', '".$postlastname."', '".$postfirstname."', '".hash('sha512',$_POST['password'])."', 'FALSE')";
			$result = mysqli_query($link,$sql);
			if($result === TRUE)
			{
				echo 'Bienvenue parmis nous !';
				header('Location: ./login_user.php');
				die();
			}
			else
			{
				display_register_form(1);
				die();
			}
		}
	}
	else
	{
		display_register_form(1);
		die();
	}
}
else
{
	display_register_form(0);
	die();
}
?>
</body>
</html>
