<?php
require_once('./sqli_connect.php');
$categ = htmlspecialchars($_GET['categ']);
$order = htmlspecialchars($_GET['order']);
if ($categ == NULL)
	$res = mysqli_query($link,'SELECT * FROM `articles`');
else if ($categ < 7)
	$res = mysqli_query($link,'SELECT * FROM `articles` where `real_cat` = "'.$categ.'"');
else if ($categ >= 7)
	$res = mysqli_query($link,'SELECT * FROM `articles` where `global_cat` = "'.$categ.'"');
$res_cat = mysqli_query($link,'SELECT * FROM `category`');
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
		function add_to_basket(id)
		{
		    var xhr = new XMLHttpRequest();
			var url = './manage_bag.php?action=add&product_id=' + id + '&qtty=1';
		    xhr.open('GET', url, true);
		    xhr.send();
			console.log(id);
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
		<?php
			if ($order === 'validate')
			{
				echo "<h2>Votre commande à bien été valider, merci de votre achat</h2>";
			}
		?>
		<div class="top">
			<h3>
				<?php echo "Bienvenue ".$_SESSION['login'] ?>
			</h3>
			<?php
				if ($categ != NULL)
				{
			?>
					<a id="back_home_page" href="index.php">Retourner à la page d'acceuil</a>
			<?php
				}
			?>
			<button class="panier" type="button" name="panier" onClick="document.location='./bag.php'">
				Voir mon panier
			</button>
		</div>
		<div class="all_articles">
			<?php
				while($result = mysqli_fetch_array($res))
				{
			?>
					<div class="article">
						<img src="<?php echo $result['picture'] ?>" alt="article image">
						<div class="article_info">
							<p><?php echo $result['name']; ?></p>
							<p><?php echo $result['price'] ?> €</p>
							<button type="button" name="add_basket" onclick="add_to_basket(<?php echo $result['id']; ?>)">Ajouter</button>
						</div>
					</div>
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>
