<?php 

session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop PHP</title>
    <link rel="stylesheet" href="views/style/style.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script src="scripts/app.js" defer></script>

</head>
<body>

<nav>
    <img src="../assets/icons/burger.png" class="burger-menu">

    <ul class="menu">
        <li><a href="/">Accueil</a></li>
        <li><a href="contact">Contact</a></li>
        <?php if (isset($_SESSION['user']['logged']) && $_SESSION['user']['logged']) : ?>
            <li><a href="profile">Profile</a></li>
            <li><a href="products">Produits</a></li>
            <li><a href="logout">Logout</a></li>
        <?php else : ?>
            <li><a href="login">Login</a></li>
            <li><a href="signup">Signup</a></li>
        <?php endif ?>
    </ul>

    <p class="site-title"><b>PHP E-SHOP</b></p>

    <li><a href="cart"><img class="cart-logo" src="../assets/icons/shopping-cart.png"></a></li>
</nav>

<div class="wrapper">

