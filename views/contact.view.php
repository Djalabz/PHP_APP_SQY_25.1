<?php 

include "partials/header.php"; 

?>

    <h1>Page de contact</h1>
        <!-- Notre formulaire de contact avec méthode POST -->
        <form class="contact-form" method="POST">
            <input name="email" type="email" placeholder="Votre mail ici ...">
            <input name="subject" type="text" placeholder="Le sujet de votre mail ...">
            <textarea name="body" cols="30" rows="10" placeholder="Votre message ..."></textarea>
            <input id="contact-sub  " name="submit" type="submit">
        </form>

        <!-- Si $error existe, on l'affiche dans un <p> -->
        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif ?>


<?php

include "partials/footer.php";

?>