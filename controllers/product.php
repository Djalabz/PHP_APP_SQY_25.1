<?php 

include 'config/cURL.php';

if (isset($_GET['product'])) {
    $id = $_GET['product'];
}

require_once 'views/product.view.php';