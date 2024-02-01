<?php 

ob_start();

include '../partials/header.php';
include '../config/pdo.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);

            $result = $stmt->fetch();

            if ($result) {
                // Mdp récuperé depuis la BDD, donc la version hashée
                $hash = $result['password'];

                if (password_verify($password, $hash)) {

                    session_start();
                    $_SESSION['user'] = $result;
                    $_SESSION['user']['logged'] = true;

                    header('Location: profile.view.php');
                    ob_end_flush();

                } else {
                    $error = "Le mot de passe est incorrect";
                }
            } else {
                $error = "L'email n'existe pas en BDD";
            }
        } else {
            $error = "L'email n'est pas au bon format";
        }
    }
}

?>



<div class="wrapper">
    <h1>LOGIN</h1>

    <form class="login-form" method="POST">
        <input type="email" name="email" placeholder="Votre email ...">
        <input type="password" name="password" placeholder="Votre mot de passe ...">
        <input type="submit" name="submit" value="login">
    </form>

    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif ?>
</div>

<?php 

include '../partials/footer.php';

?>