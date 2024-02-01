<?php 

include '../partials/header.php'; 
session_start();

?>

<div class="wrapper">
    <h1>Profil de <?= $_SESSION['user']['name'] ?></h1>
    <h2>Votre adresse mail : <?= $_SESSION['user']['email'] ?></h2>
</div>

<?php include '../partials/footer.php' ?>
