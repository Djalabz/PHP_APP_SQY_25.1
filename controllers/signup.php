<?php 

ob_start();

require_once 'views/signup.view.php';
include '../config/pdo.php';
include '../utils/functions.php';


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

                // Appel de la fonction checkExists() pour vérifier si un user n'existe pas déjà en BDD
                if (checkExists('name', $name, $pdo)) {
                    $error = "Le nom existe déjà en BDD";
                } else if (checkExists('email', $email, $pdo)) {
                    $error = "L'email est déjà utilisé";
                } else {
                    // On écrit notre requete préparée 
                    $sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute([$name, $email, $hash]);
            
                    // Si notre execute s'est bien déroulé on redirige vers une page de succès
                    if ($result) {
                        header('Location: success');
                        ob_end_flush();
                    // Sinon on affiche l'erreur en question
                    } else {
                        $error = "Erreur lors de l'ajout : " . print_r($stmt->errorInfo());
                    }
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
}