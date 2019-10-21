<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connection espace adhérent</title>
	<!-- Theme style -->
	<link rel="stylesheet" href="style.css">
</head>
<?php
require_once('./sqli_connect.php');
function display_authentication_form($errornum = 0)
{
	if ($errornum == 1)
	{
		echo '    <p class="login-box-msg">Veuillez vous identifier<br><p class="login-box-msg" style="color:#FF0000"> ERREUR A L\'AUTHENTIFICATION</p></p>';
	}
	else
	{
		echo '<p class="login-box-msg">Veuillez vous identifier</p>';
	}
	echo '	<form action="" method="POST">';
	echo '	Email : <input type="text" name="email" value="" />';
	echo '	<br />';
	echo '	Mot de passe: <input type="password" name="password" value="" />';
	echo '	<br />';
	echo '	<input type="submit" name="submit" value="OK"/>';
	echo '	</form>';
	echo '	<a href="index.php">Retourner à la page d\'accueil</a>';
	echo '	<a href="create_user.php">Creer un compte</a><br />';
}

if(isset($_POST['email']) && isset($_POST['password']))
{
	$postemail = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$res = mysqli_query($link,'SELECT * FROM `Users` where `email` = "'.$postemail.'"');
	$result = mysqli_fetch_assoc($res);
	if($result != NULL)
	{
                if($result['password'] == hash('sha512',$_POST['password']))
                {
                                $_SESSION['is_authenticated'] = TRUE;
								$_SESSION['is_admin'] = FALSE;
                                $_SESSION['login'] = $result['first_name']. ' '. $result['last_name'];
                                header('Location: ./index.php');
                                die();
                }
                else
                {
					display_authentication_form(1);
					die();
                }
        }
        else
        {
			display_authentication_form(1);
			die();
        }
}
else
{
	display_authentication_form(0);
	die();
}

?>
</body>
</html>
