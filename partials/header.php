<?php 

session_start(); 

// Opérateur ternaire : Si notre URI vaut index.php alors le chemin vers les autres pages 
// et la page de style doivent changer
$_SERVER['REQUEST_URI'] === '/index.php' ? $path = 'views/' : $path = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop PHP</title>
    <link rel="stylesheet" href="<?= $path ?>style/style.css">
    <script src="../scripts/app.js" defer></script>
</head>
<body>

<nav>

    <img src="../assets/icons/burger.png" class="burger-menu">

    <ul class="menu">
        <p class="close-menu">X</p>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="<?= $path ?>contact.view.php">Contact</a></li>
        <?php if (isset($_SESSION['user']['logged']) && $_SESSION['user']['logged']) : ?>
            <li><a href="<?= $path ?>profile.view.php">Profile</a></li>
            <li><a href="<?= $path ?>products.view.php">Produits</a></li>
            <li><a href="<?= $path ?>cart.view.php">Cart</a></li>
            <li><a href="<?= $path ?>logout.php">Logout</a></li>
        <?php else : ?>
            <li><a href="<?= $path ?>login.view.php">Login</a></li>
            <li><a href="<?= $path ?>signup.view.php">Signup</a></li>
        <?php endif ?>
    </ul>
</nav>

<div class="wrapper">

