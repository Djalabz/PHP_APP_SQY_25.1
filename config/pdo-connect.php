<?php 

include 'dotenv.php';

// Le data source name 
$dsn = "$dbsgbd:dbname=$dbname;host=$dbhost:$dbport"; 


try {
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    $pdo = new PDO($dsn, $dbuser, $dbpassword, $options);

    // echo 'Connexion réussie !';

} catch (PDOException $error) {
    echo "Il y a une erreur : $error";
}