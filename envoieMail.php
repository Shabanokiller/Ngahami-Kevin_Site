<?php
    include_once './includes/connect.php';
    $sujet = 'Envoie de Mail';
    $message = 'Vous avez ete infecte';
    $destinataire = 'kngahami@gmail.com';
    $header = "From:\"nash\"<kngahami@gmail.com>\n";
    $header .= "Reply-To:kngahami@gmail.com\n";
    $header .= "Content-Type:text/html; charset=\"iso-8859-1";
    if(mail($destinataire, $sujet, $message, $header))
    {
        echo "Votre email a ete envoye";
    }else{
        echo "echec de l'envoi";
    }


?>