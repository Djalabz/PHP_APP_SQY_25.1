<?php

include '../dotenv.php';

// In utilise la classe PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['body']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // On instancie la classe PHPMailer afin de créer un objet $mail
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host       = $mailhost;                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = $mailuser;                     
            $mail->Password   = $mailpassword;                             
            $mail->SMTPSecure = $mailsmtp;            
            $mail->Port       = $mailport;                                    

            //Recipients
            $mail->setFrom($email);
            $mail->addAddress($mail->Username, 'Romain Jalabert');                              
            $mail->Subject = $subject;
            $mail->Body    = $body;


            $mail->send();
            echo 'Message envoyé avec succès';

        } catch (Exception $e) {
            echo "Mail erreur : {$mail->ErrorInfo}";
        }

    } else {
        $error = "Assurez vous que l'email est au bon format";
    }
} 
