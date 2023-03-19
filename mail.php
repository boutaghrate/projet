<?php
if(isset($_POST['submit'])){
    // Récupération du message de l'input
    $message = $_POST['message'];

    // Destinataire
    $to = "aliatattou@gmail.com";

    // Sujet de l'email
    $sujet = "Message de la part de ".$_POST['name'];

    // Headers de l'email
    $headers = "From: ".$_POST['email']."\r\n";
    $headers .= "Reply-To: ".$_POST['email']."\r\n";

    // Envoi de l'email
    if(mail($to, $sujet, $message, $headers)){
      echo"votre email a été envyoer ";
    }else{
        echo "echec de l'envoie";
    }  

    header('Location: index.php');
}
?>
 

