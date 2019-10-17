#!/usr/bin/php
<?php
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATERD by ==> AGASPARO <==                          |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";

$i = 0;
$tab[0] = 'another_world.php';
$tab[1] = 'one_more_time.php';
$tab[2] = 'loupe.php';
$tab[3] = 'who.php';
$tab[4] = 'photos.php';
$tab[5] = 'deni.php';
$tab[6] = 'srt.php';


while ($i < 7) {
		$commade = "ex0".$i."/".$tab[$i];
	if (file_exists($commade)) {
		echo "Fichier ".$tab[$i]." : \033[32m[OK]\033[0m\n";
	} else {
		echo "Fichier ".$tab[$i]." : \033[31m[non trouve]\033[0m\n";
	}
	$i++;
}

echo "Lancement du script de correction dans 3 secondes ...\n";
sleep(3);
echo "Lancement du script\n";
sleep(0.5);

echo "\033[35m-------------------------------------------ex00------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./ex00/another_world.php "beruivb 	 	 	 vniurtb.  h ferhubv"');
if ($req == "beruivb vniurtb. h ferhubv\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('./ex00/another_world.php "beruivb 	 	 	 vniurtb.  h ferhubv" "ncueibvueribvyueby.        hbyug"');
if ($req == "beruivb vniurtb. h ferhubv\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./ex00/another_world.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex01------------------------------------\033[0m\n";

echo "test 1 : ";
$req = shell_exec('./ex01/one_more_time.php "Mardi 12 Novembre 2013 12:02:21"');
if ($req == "1384254141\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('./ex01/one_more_time.php "Mercreday 1stJuily 99"');
if ($req == "Wrong Format\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./ex01/one_more_time.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 4 : ";
$req = shell_exec('./ex01/one_more_time.php "Samedi 1 Décembre 2018 20:12:59"');
if ($req == "1543691579\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 5 : ";
$req = shell_exec('./ex01/one_more_time.php "samedi 1 Décembre 2018 20:12:59"');
if ($req == "1543691579\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 6 : ";
$req = shell_exec('./ex01/one_more_time.php "samedi 1 Decembre 2018 20:12:60"');
if ($req == "Wrong Format\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 6 (Hardcore): ";
$req = shell_exec('./ex01/one_more_time.php "samedi 2 Decembre 2018 20:12:56"');
if ($req == "Wrong Format\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex02------------------------------------\033[0m\n";

echo "test 1 : ";

$base = '<html><head><title>Nice page</title></head>
<body>Hello World <a href=http://cyan.com title="un lien">Ceci est un lien</a>
<br /><a href=http://www.riven.com> Et ca aussi <img src=wrong.image title="et encore ca"></a>
</body></html>';

$fd = fopen("page.html", "w+");
fwrite($fd, $base);
fclose($fd);

$rep = '<html><head><title>Nice page</title></head>
<body>Hello World <a href=http://cyan.com title="UN LIEN">CECI EST UN LIEN</a>
<br /><a href=http://www.riven.com> ET CA AUSSI <img src=wrong.image title="ET ENCORE CA"></a>
</body></html>';

$req = shell_exec('./ex02/loupe.php page.html > new_page.html');

if (file_get_contents("new_page.html") == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex03------------------------------------\033[0m\n";

echo "test 1 : ";
$tab = shell_exec('who');
$tab1 = shell_exec('./ex03/who.php');
if ($tab == $tab1) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
	print_r(array_diff($tab, $tab1));
}

echo "\033[35m-------------------------------------------ex04------------------------------------\033[0m\n";

echo "test 1 : ";
$req = exec('ls ex04/');
if ($req == "photos.php") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
exec('./ex04/photos.php "http://www.42.fr"');
$req = exec('ls www.42.fr/');
if ($req != "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex06------------------------------------\033[0m\n";

echo "test 1 : ";
$req = shell_exec('./ex06/srt.php test.srt');
$res = "1
00:01:15,308 --> 00:01:16,717
Ceci

2
00:01:16,817 --> 00:01:19,650
est

3
00:01:19,750 --> 00:01:21,373
un

4
00:01:21,473 --> 00:01:23,614
test
";
if ($req == $res) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

?>
