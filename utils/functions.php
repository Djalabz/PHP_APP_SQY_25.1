<?php

// FICHIER DE FONCTIONS UTILES

// SIGNUP

function checkExists($field, $param, $pdo) {
    // Vérifier si le nom et l'email ne sont pas déjà en BDD
    $sql = "SELECT * FROM users WHERE $field = ?";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$param]);
    
    // Opérateur ternaire cad autre manière d'écrire des if ... else 
    return ($stmt->rowCount() > 0) ? true : false;
}


// FONCTION DUMP AND DIE - pour inspecter des variables

function dd($param) {
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
    die();
}