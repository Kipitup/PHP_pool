#!/usr/bin/php
<?php
$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
$tab2 = array("1", "2", "3");

include("ft_is_sort.php");
if (ft_is_sort($tab2) == true)
	echo "Le tableau est trie\n";
else
	echo "Le tableau n’est pas trie\n";
?>
