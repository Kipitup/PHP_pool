<?php
require_once('./functions_bag.php');
if(isset ($_GET['action']))
{
    if($_GET['action'] == 'add')
        ajouterArticle($_GET['product_id'], $_GET['qtty']);
    else if($_GET['action'] == 'delete')
        supprimerArticle($_GET['product_id']);
	else if($_GET['action'] == 'modif')
        modifierQTeArticle($_GET['product_id']);
}
else
{
	var_dump($_GET);
	echo "pas d'actions";
}
?>
