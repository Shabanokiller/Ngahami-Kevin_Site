<?php
session_start();
require_once '../includes/connect.php';
// require_once '../session/authentifier.classe.php';
$data =  $_SESSION["user"]["email"];
$id = htmlentities(trim($_GET['id']));
// echo $id;
$sql = "SELECT  `Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail` FROM `visite` where id=? ";

$query = $db->prepare($sql);
$query -> execute(array($id));
$query = $query->fetch();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> PAGE DE RECENSEMENT</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleNave.css">
    <link rel="stylesheet" href="../css/styleLieux.css">
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->

    <!-- <form method="get" action="recherche.php">
        Recherche : <input type="search" name="cherhce">
        <input type="submit" value="Recherche">
    </form> -->
    

    <form id="form" method="POST" action="/profil.php">
        <div>
            <Label for ="Email">Email</label>    
            <input type="texte" name="mail" id="mail" value="<?= $_SESSION["user"]["email"] ?>" placeholder="email...">
        </div>
        <div>
            <Label for ="Lieu">Nom du lieu</label>    
            <input type="texte" name="nom_lieu" id="nom_lieu" value="<?= $query['Nom Du Lieu'] ?> " placeholder="Nom Du Lieu...">
        </div>
        <div>
            <Label for ="numero civique">Numero Civique </label>    
            <input type="texte" name="numero_civique" value="<?= $query['Numéro Civique'] ?>" id="numero_civique" placeholder="Numero De Rue...">
        </div>
        <div>
            <Label for ="rue">Rue </label>    
            <input type="texte" name="rue" value="<?= $query['Rue'] ?>" id="rue" placeholder="Nom De La Rue...">
        </div>
        <div>
            <Label for ="ville">Ville </label>    
            <input type="texte" name="ville" value="<?= $query['Ville'] ?>" id="ville" placeholder="Nom De La Ville...">
        </div>
        <div>
            <Label for ="province">Province </label>    
            <input type="texte" name="province" value="<?= $query['Province'] ?>" id="province" placeholder="Nom De La Province...">
        </div>
        <div>
            <Label for ="Date Arrivee">Date Arrivee</label>    
            <input type="date" name="date_arrivee" value="<?= $query['Date Arrivee'] ?>" id="Date Arrivee">
        </div>
        <div>
            <Label for ="Date Depart">Date Arrivee</label>    
            <input type="date" name="date_depart" value="<?= $query['Date Depart'] ?>" id="Date Depart">
        </div>
        <div>
            <Label for ="Pathologie">Pathologie :</label>    
            <input type="text" name="pathologie"  id="pathologie" placeholder="Repondre par OUI ou NON"> 
        </div>
        <!-- <button id="btn" name="valid_connection" onclick="postAjax();"> Valider </button> -->
        <div align="center">
            <input type="submit" id="btn" name="valid_connection" value="Validation">
        </div>
        <!-- <div id="msg">
            <pre></pre>
        </div> -->
    </form>
    <!-- <script src="../js/java.js"></script> -->
    <!-- <script src="../js/envoie.js"></script>  -->
    <!-- <script src="../js/envoieDonnees.js"></script> -->
    <script src="../js/recherche.js"></script>
</body>
</html>