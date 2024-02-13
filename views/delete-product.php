<?php

session_start();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    if ($_SESSION['user']['cart'][$id]['quantity'] > 1) {
        $_SESSION['user']['cart'][$id]['quantity'] -= 1;
        header('Location: cart');
    } else {
        unset($_SESSION['user']['cart'][$id]);
        header('Location: cart');
    }
}