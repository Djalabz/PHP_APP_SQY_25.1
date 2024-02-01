<?php 

include '../partials/header.php';
include '../config/pdo.php';


// On vérifie que le form ait été soumis 
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // On vérifie que TOUS les champs soient bien remplis 
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {

        $name = htmlspecialchars($_POST['name']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        // On vérifie que les mdp soient les memes sinon erreur
        if ($password === $confirm) {
            // On vérifie le format de l'email
            if (filter_var($email, FILTER_VALIDATE_EMAIL))  {
                // Création du hash
                $hash = password_hash($password, PASSWORD_DEFAULT);
        
                // On écrit notre requete préparée 
                $sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute([$name, $email, $hash]);
        
                // Si notre execute s'est bien déroulé on redirige vers une page de succès
                if ($result) {
                    header('Location: signup-sucess.view.php');
                // Sinon on affiche l'erreur en question
                } else {
                    $error = "Erreur lors de l'ajout : " . $stmt->errorInfo();
                }
            } else {
                $error = "L'email n'est pas au bon format";
            }
        } else {
            $error = "Les mots de passe sont différents, veuillez renseigner les memes mot de passe";
        }
    } else {
        $error = "Veuillez remplir tous les champs !";
    }
}?>

<div class="wrapper">
    <h1>SIGNUP</h1>

    <form class="signup-form" method="POST">
        <input type="text" name="name" placeholder="Votre pseudo ...">
        <input type="email" name="email" placeholder="Votre email ...">
        <input type="password" name="password" placeholder="Votre mot de passe ...">
        <input type="password" name="confirm" placeholder="Confirmer votre mot de passe ...">
        <input type="submit" name="submit" value="signup">
    </form>

    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif ?>
</div>

<?php 

include '../partials/footer.php' 

?>