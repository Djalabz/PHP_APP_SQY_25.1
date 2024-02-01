<?php 

include '../partials/header.php';

?>

<div class="wrapper">

    <h1>SIGNUP</h1>

    <form class="signup-form" method="POST">
        <input type="text" name="name" placeholder="Votre pseudo ...">
        <input type="email" name="email" placeholder="Votre email ...">
        <input type="password" name="password" placeholder="Votre mot de passe ...">
        <input type="password" name="confirm" placeholder="Confirmer votre mot de passe ...">
        <input type="submit" name="submit" value="signup">
    </form>

</div>

<?php include '../partials/footer.php' ?>