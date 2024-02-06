<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop PHP</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="home.view.php">Accueil</a></li>
        <li><a href="contact.view.php">Contact</a></li>
        
        <?php if (isset($_SESSION['user']['logged']) && $_SESSION['user']['logged']) : ?>

            <li><a href="products.view.php">Produits</a></li>
            <li><a href="logout.php">Logout</a></li>

        <?php else : ?>

            <li><a href="login.view.php">Login</a></li>
            <li><a href="signup.view.php">Signup</a></li>

        <?php endif ?>
    </ul>
</nav>

<div class="wrapper">