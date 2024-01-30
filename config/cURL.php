<?php


// L'URL cible : celle depuis laquelle on récupère des données en format JSON 
// Ici il s'agit d'une liste de produit depuis fakestoreapi
$url = 'https://fakestoreapi.com/products';

// On initialise curl 
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// On éxecute la requete qvec curl_exec
$resp = curl_exec($ch);

// Si erreur il y a, on l'affiche avec var_dump, 
// sinon on décode la réponse qui est en JSON 
if ($e = curl_error($ch)) {
    var_dump($e);
} else {
    $products = json_decode($resp, true);
}

curl_close($ch);
