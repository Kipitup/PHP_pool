<?php
function ft_is_sort(array $input) {
	$tab = $input;
	sort($tab);
	return ($input === $tab);
}
?>
