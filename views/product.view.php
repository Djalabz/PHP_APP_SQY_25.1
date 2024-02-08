<?php  

include 'partials/header.php';

?>

    <h1>Page de produit</h1>

        <?php foreach($products as $product) : ?>
            <?php if ($id == $product['id']) : ?>
                <div class="product">
                    <a href="#"><img src="<?= $product['image'] ?>" alt=""></a>
                    <h2><?= $product['title'] ?></h2>
                    <h3><?= substr($product['description'], 0, 50) ?> ...</h3>
                    <h2><?= $product['price'] ?> €</h2>
                    <button><a href="cart?product=<?= $product['id'] ?>">Ajouter au panier</a></button>
                </div>
            <?php endif ?>
        <?php endforeach ?>
