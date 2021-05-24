<?php
session_start();
require_once '../includes/connect.php';
// require_once '../session/authentifier.classe.php';
$data =  $_SESSION["user"]["email"];
$sql = "SELECT `Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail` FROM `visite`, `users` where visite.mail LIKE '$data' ";

$query = $db->prepare($sql);
$query -> execute(array());
$query = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> PAGE DE RECENSEMENT</title>
    <link rel="stylesheet" href="../css/styleNave.css">
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <h2> Profil de <?= $_SESSION["user"]["pseudo"] ?> </h2>

    <p>Pseudo: <?= $_SESSION["user"]["pseudo"] ?>  </p>
    <p>Email: <?= $_SESSION["user"]["email"] ?>  </p>

    <!-- <form method="get" action="recherche.php">
        Recherche : <input type="search" name="cherhce">
        <input type="submit" value="Recherche">
    </form> -->

    <form id="form" method="POST" action="#">
    <?php
            foreach($query as $ap){
                ?>
                <div>
                    <Label for ="Email">Email</label>    
                    <input type="texte" name="mail" id="mail" value="<?= $_SESSION["user"]["email"] ?>" placeholder="email...">
                </div>
                <div>
                    <Label for ="Lieu">Nom du lieu</label>    
                    <input type="texte" name="nom_lieu" id="nom_lieu" value="<?= $ap['Nom Du Lieu'] ?> " placeholder="Nom Du Lieu...">
                </div>
                <div>
                    <Label for ="numero civique">Numero Civique </label>    
                    <input type="texte" name="numero_civique" value="<?= $ap['Numéro Civique'] ?>" id="numero_civique" placeholder="Numero De Rue...">
                </div>
                <div>
                    <Label for ="rue">Rue </label>    
                    <input type="texte" name="rue" value="<?= $ap['Rue'] ?>" id="rue" placeholder="Nom De La Rue...">
                </div>
                <div>
                    <Label for ="ville">Ville </label>    
                    <input type="texte" name="ville" value="<?= $ap['Ville'] ?>" id="ville" placeholder="Nom De La Ville...">
                </div>
                <div>
                    <Label for ="province">Province </label>    
                    <input type="texte" name="province" value="<?= $ap['Province'] ?>" id="province" placeholder="Nom De La Province...">
                </div>
                <div>
                    <Label for ="Date Arrivee">Date Arrivee</label>    
                    <input type="date" name="date_arrivee" value="<?= $ap['Date Arrivee'] ?>" id="Date Arrivee">
                </div>
                <div>
                    <Label for ="Date Depart">Date Arrivee</label>    
                    <input type="date" name="date_depart" value="<?= $ap['Date Depart'] ?>" id="Date Depart">
                </div>
                <div>
                    <Label for ="Pathologie">Pathologie</label>    
                    <input type="radio" name="pathologie"  id="pathologie" value="Oui">  Oui
                </div>
                <!-- <button id="btn" name="valid_connection" onclick="postAjax();"> Valider </button> -->
                <div id="status"></div>
                <input type="submit" id="btn" name="valid_connection" value="Validation">
                <?php
                

            }
        
        ?>
        
        <!-- <div id="msg">
            <pre></pre>
        </div> -->
    </form>
    <!-- <script src="../js/java.js"></script> -->
    <!-- <script src="../js/envoie.js"></script>  -->
    <!-- <script src="../js/envoieDonnees.js"></script> -->
    <script src="../js/ajax.js"></script>
</body>
</html>