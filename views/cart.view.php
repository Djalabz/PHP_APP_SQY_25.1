<?php 

include "partials/header.php"; 

?>

<h1>Mon panier</h1>

<!-- On parcourt les produits que l'on récupère depuis l'API fakestore -->
<?php foreach($products as $product) : ?>

    <!-- Si dans ces produits un produit possède l'id transmis via l'URL ... -->
    <?php if ((isset($id) && $id == $product['id']) && (!isset($_SESSION['user']['cart'][$id]))) : ?>

        <!-- ... On le rajoute à la partie cart de user dans $_SESSION en utilisant l'id comme clé -->
        <?php 
            $_SESSION['user']['cart'][$id] = $product; 
            $_SESSION['user']['cart'][$id]['quantity'] = 1; 
        ?>
    
        <?php elseif ((isset($id) && $id == $product['id']) && (isset($_SESSION['user']['cart'][$id]))) : ?>

        <?php 
            $_SESSION['user']['cart'][$id]['quantity'] += 1;
        ?> 

    <?php endif ?>

<?php endforeach ?>

<!-- Si jamais on a des éléments dans notre panier alors on affiche la liste  -->
<?php if (!empty($_SESSION['user']['cart'])) : ?>
    <?php foreach($_SESSION['user']['cart'] as $item) : ?>

        <h3><?= $item['title'] ?></h3>
        <p>Prix : <?= $item['price'] ?> $</p>
        <img src="<?= $item['image'] ?>">
        <p>Quantité : <?= $item['quantity'] ?></p>
        <a class="delete-btn" href="delete?delete=<?= $item['id'] ?>">Supprimer du panier</a>
    
    <?php endforeach ?>

<!-- Si jamais on en a pas alors on dit que le panier est vide -->
    <?php else : ?>
        <h3>Votre panier est vide ...</h3>

    <?php endif ?>

<?php

dd($_SESSION['user']['cart']);

include "partials/footer.php"; ?>  