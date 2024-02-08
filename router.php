<?php 

// récupérer l'uri 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Alternative : utiliser basename pour le dernier élément de l'uri

// Définir le tableau associatif des routes
$routes = [ 
    '/' => 'controllers/index.php',
    '/signup' => 'controllers/signup.php',
    '/login' => 'controllers/login.php',
    '/cart' => 'controllers/cart.php',
    '/profile' => 'controllers/profile.php',
    '/logout' => 'controllers/logout.php',
    '/contact' => 'controllers/contact.php',
    '/product' => 'controllers/product.php',
    '/products' => 'controllers/products.php',
    '/success' => 'views/signup-sucess.view.php',
    '/delete' => 'views/delete-product.php'
];


// On viendra require la bonne page ou la 404 à partir des clés du tableau $routes
(array_key_exists($uri, $routes)) ? require $routes[$uri] : require 'controllers/404.php';