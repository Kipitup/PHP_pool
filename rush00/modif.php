<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modification de donnéeis</title>
	<link rel="stylesheet" href="style.css">
</head>
<?php
require_once('./sqli_connect.php');

function display_register_form($errornum = 0)
{
	if ($errornum ==1)
	{
		echo 'Veuillez renseigner tous les champs, modifiez ce que vous souhaitez <br /> ERREUR LORS DES CHNAGEMENTS, VEUILLEZ REESSAYER<br />';
	}
	else
	{
		echo 'Veuillez renseigner tous les champs, modifiez tous le schamps que vous souhaitez';
	}
	echo '	<form action="" method="POST">';
	echo '		Email: <input type="text" name="email" value="" />';
		echo '	<br />';
	echo '		Nouvel Email: <input type="text" name="new_email" value="" />';
		echo '	<br />';
	echo '		Nom: <input type="text" name="last_name" value="" />';
	echo '		<br />';
	echo '		Nouveau Nom: <input type="text" name="new_last_name" value="" />';
	echo '		<br />';
		echo '	Prénom: <input type="text" name="first_name" value="" />';
	echo '		<br /> ';
		echo '	Nouveau Prénom: <input type="text" name="new_first_name" value="" />';
	echo '		<br /> ';
	echo '		Mot de passe: <input type="password" name="password" value="" />';
	echo '		<br />';
	echo '		Nouveau Mot de passe: <input type="password" name="new_password" value="" />';
	echo '		<br />';
	echo '		<input type="submit" name="submit" value="OK"/>';
	echo '		</form>';
	echo '	<a href="delete_user.php">Si vous souhaitez supprimer votre compte c\'est par ici</a>';
	echo '	<a href="index.html">Retourner à la page d\'accueil</a>';
}

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['new_email']) && isset($_POST['new_password']) && isset($_POST['new_last_name']) && isset($_POST['new_first_name']))
{
	echo "name pass";
	if(isset($_POST['submit']) && $_POST['submit'] === "OK")
	{
		$postemail = htmlspecialchars($_POST['email'], ENT_QUOTES);
		$postlastname = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
		$postfirstname = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
		$newemail = htmlspecialchars($_POST['new_email'], ENT_QUOTES);
		$newlastname = htmlspecialchars($_POST['new_last_name'], ENT_QUOTES);
		$newfirstname = htmlspecialchars($_POST['new_first_name'], ENT_QUOTES);
		$res = mysqli_query($link,'SELECT * FROM `users` where `email` = "'.$postemail.'"');
		$result = mysqli_fetch_assoc($res);
		if($result != NULL)
		{
               if( $result['email'] === $postemail && $result['last_name'] === $postlastname && $result['first_name'] === $postfirstname && $result['password'] == hash('sha512',$_POST['password']))
			   {
				   $newpass=hash('sha512',$_POST['new_password']);
				   $id=$result['id'];
				   $sql="UPDATE `users` SET `email` = $newemail, `last_name` = $newlastname, `first_name` = $newfirstname, `password` = $newpass  WHERE `users`.`id` = $id;";
			   		var_dump($sql);die();	   
					$res = mysqli_query($link,$sql);
				   $_SESSION['login'] = $newfirstname. ' '. $newlastname;
                    header('Location: ./index.php');
                    die();
                }
                else
                {
                    display_register_form(1);
                    die();
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
