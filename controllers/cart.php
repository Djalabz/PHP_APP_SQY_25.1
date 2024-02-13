<?php 

session_start();


include "config/cURL.php";
include "utils/functions.php";

// On vérifie l'URL pour trouver l'id du produit à rajouter au panier
if (isset($_GET['product'])) {
    $id = $_GET['product'];
}

require_once 'views/cart.view.php';

