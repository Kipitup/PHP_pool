<?php
function ft_split($input) {
	$input = trim($input);
	$tab = preg_split("/[ ]+/", $input);
	sort($tab);
	// return ($tab)
}
?>
