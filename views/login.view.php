
<h1>LOGIN</h1>

<form class="login-form" method="POST">
    <input type="email" name="email" placeholder="Votre email ...">
    <input type="password" name="password" placeholder="Votre mot de passe ...">
    <input type="submit" name="submit" value="login">
</form>

<?php if (isset($error)) : ?>
    <p class="error"><?= $error ?></p>
<?php endif ?>


<?php include 'partials/footer.php'; ?>