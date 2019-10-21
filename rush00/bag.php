<?php
require_once('./sqli_connect.php');
require_once('./functions_bag.php');
$res = mysqli_query($link,'SELECT * FROM `articles`');
$res_cat = mysqli_query($link,'SELECT * FROM `category`');
$basket = array();
$total = 0;
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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="style_index.css">
</head>
<body>
	<script>
		function validate_order(id)
		{
		    // var xhr = new XMLHttpRequest();
			// var url = './manage_bag.php?action=delete&product_id=' + id;
		    // xhr.open('GET', url, true);
		    // xhr.send();
			document.location='./confirm.php?order=validate';
		}
	</script>
	<script>
		function delete_order(id)
		{
		   var xhr = new XMLHttpRequest();
		   var url = './manage_bag.php?action=delete&product_id=' + id;
		   xhr.open('GET', url, true);
		   xhr.send();
		   document.location='./bag.php';
		}
	</script>
	<script>
		function modif_qtty(id)
		{
		   var xhr = new XMLHttpRequest();
		   var url = './manage_bag.php?action=modif&product_id=' + id;
		   xhr.open('GET', url, true);
		   xhr.send();
		   document.location='./bag.php';
		}
	</script>
	<div class="myheader">
		<div class="dropdown">
				<button class="dropbtn">Categorie</button>
				<div class="dropdown-content">
					<?php
						while($result_cat = mysqli_fetch_array($res_cat))
						{
					?>
							<a href="index.php?categ=<?php echo $result_cat['id']; ?>"><?php echo $result_cat['name']; ?></a>
					<?php
						}
					?>
				</div>
		</div>
		<h1>ÉPICERIE FINE</h1>
		<div class="user_access">
			<?php
				if (($_SESSION) && ($_SESSION['is_authenticated'] == TRUE))
				{
			?>
					<a href="login_admin.php">Espace connection Gérant</a><br/>
					<a href="logout.php">Déconnection</a><br/>
			<?php
				}
				else
				{
			?>
					<a href="create_user.php">Créer un compte</a><br/>
					<a href="login_user.php">Espace connection client</a><br/>
					<a href="login_admin.php">Espace connection Gérant</a><br/>
			<?php
				}
			 ?>
		</div>
	</div>
	<div class="content">
		<div class="top">
			<h3>
				<?php echo "Voici votre panier"?>
			</h3>
			<a id="back_home_page" href="index.php">Retourner à la page d'acceuil</a>
		</div>
		<div class="all_articles">
			<?php
				$count = count($basket);
				if ($count > 0)
				{
					while($result = mysqli_fetch_array($res))
					{
						foreach ($basket as $key => $value)
						{
							if ($value['id'] == $result['id'])
							{
								$total += ($result['price'] * $value['qtty']);
			?>
								<div id="article_basket">
									<img src="<?php echo $result['picture'] ?>" alt="article image">
									<div class="article_info">
										<p><?php echo $result['name']; ?></p>
										<p><?php echo $result['price'] ?> €</p>
										<p>Quantité: <?php echo $value['qtty'] ?></p> <br>
									</div>
									<button type="button" name="delete_article" onclick="delete_order(<?php echo $result['id']; ?>)">Supprimer</button>
									<button type="button" name="modifierQTeArticle" onclick="modif_qtty(<?php echo $result['id']; ?>)">Modifier quantité</button>
								</div>
			<?php
							}
						}
					}
				}
				else
					echo "<p>Votre panier est vide :(</p>";
			?>
		</div>
		<div class="bottom">
			<p>Total: <?php echo $total ?> €</p>
			<?php
				if ($count > 0)
				{
			?>
				<?php
					if (($_SESSION) && ($_SESSION['is_authenticated'] == TRUE))
					{
				?>
						<div class="validate_button">
							<button id="validate" type="button" name="validate" onclick="validate_order(<?php echo $basket; ?>)">Valider la commande</button>
						</div>
				<?php
					}
					else
					{
				?>
						<p>Afin de valider le panier, veuillez vous connecter</p>
				<?php
					}
				 ?>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>
