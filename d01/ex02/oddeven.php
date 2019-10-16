#!/usr/bin/php
<?php
function check($number){
	if (is_numeric($number) == false)
		echo "'$number' n'est pas un chiffre\n";
    else if($number % 2 == 0)
        echo "Le chiffre $number est Pair\n";
    else
		echo "Le chiffre $number est Impair\n";
}
while (1)
{
	echo "Entrez un nombre: ";
	$input = rtrim(fgets(STDIN));
	if (feof(STDIN) == true)
	{
		echo "^D\n";
		exit;
	}
	else
		check($input);
}
?>
