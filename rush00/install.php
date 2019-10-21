#!/usr/bin/php
<?php

	$link=mysqli_connect('127.0.0.1', 'root', 'mdeltour');
	if (!$link)
	{
		$link = mysqli_connect('127.0.0.1', 'root', 'amartino');
		if (!$link)
		{
			die('Could not connect: ' . mysqli_error());
		}
	}
	
	$db_selected = mysqli_select_db($link,'db_shop');
	
	if (!$db_selected)
	{
		$sql = 'CREATE DATABASE IF NOT EXISTS db_shop';
		if (mysqli_query($link, $sql))
		{
			echo "Database db_shop created successfully\n";
		}
		else
		{
			echo 'Error creating database: ' . mysqli_error() . "\n";
			die();
		}
	}
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
		echo "je suis connecté amartino\n";
	}
	echo "je suis connecté mdeltour\n";

$sql="CREATE TABLE `articles` (`id` int(11) NOT NULL,`name` text NOT NULL,`price` int(11) NOT NULL,`global_cat` int(11) NOT NULL,`real_cat` int(11) NOT NULL,`stock` int(11) NOT NULL,`picture` text NOT NULL,`description` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql="INSERT INTO `articles` (`id`, `name`, `price`, `global_cat`, `real_cat`, `stock`, `picture`, `description`) VALUES(1, 'Thé du hammam sachet 100g', 9, 7, 1, 15, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/t/h/the-du-hammam-sachet-100g-palais-des-thes_1.jpg', 'Découvrez le Rooibos Du Hammam de Palais des Thés. Inspiré d\'une recette turque de thé vert, c\'est un mélange fruité évoquant les aromates qui parfument le hammam : rose, datte verte, fruits rouges et fleur d\'oranger'),(2, 'Café Arabica Moka d\'Ethiopie bio', 5, 7, 2, 46, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/c/a/cafe-arabica-moka-ethiopie-bio-comptoirs-richard_1.jpg', 'Sauvage et parfumé, le café moulu pur Arabica Moka d\'Ethiopie bio COMPTOIRS RICHARD est un café emblématique, révélant une grande finesse aromatique. Ses notes d\'agrumes et de fleurs sauront vous séduire.'),(3, 'Grand Granola Aphrodisiaque', 6, 9, 5, 12, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/g/r/grand-granola-aphrodisiaque-fourmi-bionique_1.jpg', 'Le Grand Granola Aphrodisiaque de la marque FOURMI BIONIQUE est un mélange de céréales dorées au miel avec du chocolat noir, des amandes grillées, des raisins de Corinthe et du ginseng sibérien.'),(4, 'Pâtes papillons 6 saveurs', 7, 8, 6, 15, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/p/a/pates-papillons-6-saveurs-morelli_1.jpg', 'Fabriquées en Italie selon des techniques artisanales à partir du germe de blé, ces pâtes papillons aux 6 saveurs ont une excellente tenue à la cuisson. Leur couleur, leur forme et leur goût raviront petits et grands !'),(5, 'Chocolat poudre caramel beurre salé', 8, 7, 3, 25, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/c/h/chocolat-poudre-caramel-beurre-sale-dolfin_1.jpg', 'Découvrez la recette gourmande du chocolat en poudre aromatisé au caramel beurre salé de la marque DOLFIN. Concoctez-vous un chocolat chaud réconfortant et prenez le temps de vous faire plaisir.'),(6, 'Sucre d\'orge multicolore', 2, 8, 4, 0, 'https://www.dubruitdanslacuisine.fr/media/catalog/product/cache/image/800x800/e9c3970ab036de70892d86c6d221abfe/s/u/sucre-canne-multicolore-apidis_1.jpg', 'Le sucre d\'orge multicolore est une sucette au goût de fraise. Une confiserie à offrir à vos enfants ou pour décorer un sapin de Noël.');";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql="CREATE TABLE IF NOT EXISTS `category` (`id` int(11) NOT NULL,`name` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql= "INSERT INTO `category` (`id`, `name`) VALUES(1, 'Thé et infusion'),(2, 'Café'),(3, 'Chocolat'),(4, 'Confiserie et sucres'),(5, 'Biscuit et pain d\'épices'),(6, 'Pâte, risotto'),(7, 'Boissons'),(8, 'Sucrés'),(9, 'Salés');";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql="CREATE TABLE IF NOT EXISTS `users` (  `id` int(11) NOT NULL,  `email` text NOT NULL,  `last_name` text NOT NULL,  `first_name` text NOT NULL,  `password` text NOT NULL,  `is_admin` tinyint(1) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="INSERT INTO `users` (`id`, `email`, `last_name`, `first_name`, `password`, `is_admin`) VALUES(2, 'kipit', 'kipit', 'kipit', '210d810306ce4b866ebafb4498da23e67168918623daf9779795515663e4f7ea1532367a225bd8e901feef2fced5968eba473991d41db3e9dc18b1bc2fc3075b', 0),(3, 'amartino', 'Martinod', 'Alexandre', 'b0760923740fe92e607fac67fc9bbc911d3fdeaac0703d489055c11ab4b9c6c921e36e24f2e2d257b743c614f875315aed72eb356a4040873dd9b745fef8774c', 1);";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="CREATE TABLE `commandes` (`id` int(11) NOT NULL, `user_id` int(11) NOT NULL, `data_commande` mediumtext NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

mysqli_query($link, $sql) or die(mysqli_error($link));



$sql="ALTER TABLE `articles` ADD PRIMARY KEY (`id`);";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="ALTER TABLE `category`  ADD PRIMARY KEY (`id`);";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="ALTER TABLE `users` ADD PRIMARY KEY (`id`);";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="ALTER TABLE `commandes` ADD PRIMARY KEY (`id`);";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="ALTER TABLE `articles`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql="ALTER TABLE `category` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;";

mysqli_query($link, $sql) or die(mysqli_error($link));


$sql="ALTER TABLE `users`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";

mysqli_query($link, $sql) or die(mysqli_error($link));

$sql="ALTER TABLE `commandes`  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

mysqli_query($link, $sql) or die(mysqli_error($link));
?>
