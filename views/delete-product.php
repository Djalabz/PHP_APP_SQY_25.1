<?php

session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    unset($_SESSION['user']['cart'][$id]);
    header('Location: cart.view.php');
}