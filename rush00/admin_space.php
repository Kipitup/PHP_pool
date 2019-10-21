<?php
session_start();
require_once('./sqli_connect.php');
$res = mysqli_query($link,'SELECT * FROM `category`');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Espace administrateur</title>
	<link rel="stylesheet" href="style_admin_space.css">
</head>
<body>
	<div class="myheader">
		<h1>Panel Administrateur</h1>
		<div class="user_access">
			<?php
				if (($_SESSION) && ($_SESSION['is_admin'] == TRUE))
				{
			?>
					<a href="logout.php">Déconnection</a><br/>
					<a href="index.php">Page d'acueil</a>
					<a href="admin_manage_commands.php">Gérer les commandes</a>
			<?php
				}
			 ?>
		</div>
	</div>
	<div class="content">
		<?php
			if (($_SESSION) == NULL || ($_SESSION['is_admin'] == FALSE))
			{
		?>
				<a href="index.php">Retourner à la page d'accueil</a>
				<h2>Vous n'avez pas les droits administrateurs</h2>
		<?php
			}
			else
			{
		?>
			<div class="top">
				<h3>
					<?php echo "Bienvenue ".$_SESSION['login'] ?>
				</h3>
			</div>
			<div class="global_cat">

			</div>
			<div class="real_cat">
				<?php
					while($result = mysqli_fetch_array($res))
					{
				?>
						<div class="category" id="tea">
							<?php echo $result['name'],"\n"; ?>
						</div>
				<?php
					}
				?>
			</div>
		<?php
			}
		?>
	</div>
</body>
</html>
