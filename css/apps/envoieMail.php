<?php
    include_once './includes/connect.php';
    session_start();
    $data = "Oui";
    $data1 = "oui";
    $sql = "SELECT `Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail` FROM `visite` where visite.pathologie LIKE '$data' OR '$data1' ";
    $query = $db->prepare($sql);
    $query -> execute(array());
    $query = $query->fetchAll();

    foreach($query as $ap)
    {
        $sujet = 'Envoie de Mail';
        $message = 'Vous avez ete infecte';
        $destinataire =  $_SESSION["user"]["email"] ;
        $header = "From:\"nash\"<kngahami@gmail.com>\n";
        $header .= "Reply-To:kngahami@gmail.com\n";
        $header .= "Content-Type:text/html; charset=\"iso-8859-1";
        if(mail($destinataire, $sujet, $message, $header))
        {
            echo "Votre email a ete envoye";
        }else{
            echo "echec de l'envoi";
        }
    }   

?>