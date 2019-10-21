<?php
require_once('./sqli_connect.php');
function creationPanier()
{
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
   }
   return true;
}

function ajouterArticle($id_produit, $quantite_produit){

    //Si le panier existe
    if (creationPanier())
    {
        //Si le produit existe déjà on ajoute seulement la quantité a la quantitée deja existante
        if(isset($_SESSION['panier'][$id_produit]))
        {
            $_SESSION['panier'][$id_produit]['quantite'] = intval($_SESSION['panier'][$id_produit]['quantite'] + $quantite_produit);
            echo "la quantite du produit deja dans le panier a bien ete modifiee";
        }
        //Sinon, on ajoute le produit au panier
        else
        {
            $_SESSION['panier'][$id_produit] = array();
            $_SESSION['panier'][$id_produit]['quantite'] = intval($quantite_produit);
            echo "produit bien ajouté au panier";
			print_r($_SESSION);
        }
    }
    else
    {
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }
}

function supprimerArticle($id_produit){
    //Si le panier existe
    if (creationPanier())
    {
        if(isset($_SESSION['panier'][$id_produit]))
        {
            $_SESSION['panier'][$id_produit] = null;
            echo "produit supprime du panier";
        }
        else
        {
            echo "le produit n'existe pas dans le panier";
        }
    }
    else
    	echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function modifierQTeArticle($id_produit){
    //Si le panier éxiste
    if (creationPanier())
    {
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($_SESSION['panier'][$id_produit]['quantite'] > 0)
        {
            //Recharche du produit dans le panier
            if (isset($_SESSION['panier'][$id_produit]))
            {
                $_SESSION['panier'][$id_produit]['quantite'] -= 1;
                echo "quantite du produit modifie";
            }
            else
            {

                echo "le produit n'existe pas dans le panier";
            }
        }
        else
        	supprimerArticle($id_produit);
    }
    else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
/*
function MontantGlobal(){

    $total = 0;
    foreach($_SESSION['panier'] as $id_produit (qui contiendra lid de produit) => $quantite -- POUR CHACUN DES ID DE PRODUIT DS LE PANIER)
        res = select price from article where id = $id_produit
        $total = $total + $res[price];
    return($total);
}
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}

function compterArticles()
{
    if (isset($_SESSION['panier']))
        return count($_SESSION['panier']);
}

?>
