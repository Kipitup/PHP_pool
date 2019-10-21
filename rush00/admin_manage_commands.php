<?php
session_start();
require_once('./sqli_connect.php');
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
					<a href="index.php">Page d'accueil</a>
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
					$res = mysqli_query($link,'SELECT `commandes`.`id`, `commandes`.`user_id`, `commandes`.`data_commande`,`users`.`email` FROM `commandes` LEFT JOIN `users` ON `commandes`.`user_id` = `users`.`id`');
					while($result = mysqli_fetch_array($res))
					{
						$line = "";
						$data_comm = json_decode($result['data_commande'], TRUE);
						foreach ($data_comm as $cur_article) {
							$res_art = mysqli_query($link,'SELECT * FROM `articles` WHERE `id`='.intval($cur_article['id']));
							$result_art = mysqli_fetch_array($res_art);
							$line = $line.$result_art['name']." (quantite : ".intval($cur_article['qtty'])."), ";
						}
				?>
						<div class="commands_list" id="tea">
							commande no <?php echo $result['id'],"\n"; ?>) L'utilisateur id <?php echo $result['user_id'],"\n"; ?> ( email : <?php echo $result['email'],"\n"; ?>) a commande les produits suivants : <?php echo $line; ?>
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
