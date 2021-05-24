<?php
    session_start();
    require_once '../validationLieux.php';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styleProfil.css">
    <link rel="stylesheet" href="../css/styleNave.css">
    <title> PAGE DE RECENSEMENT</title>
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <h2>BIENVENUE sur le profil de <?= $_SESSION["user"]["pseudo"] ?> </h2>

    <!-- <p>Pseudo: <?= $_SESSION["user"]["pseudo"] ?>  </p>
    <p>Email: <?= $_SESSION["user"]["email"] ?>  </p>

    <form method="get" action="recherche.php">
        Recherche : <input type="search" name="cherhce">
        <input type="submit" value="Recherche">
    </form>

    <form method="POST" action="">
        <div>
            <Label for ="Lieu">Nom DU Lieu</label>    
            <input type="texte" name="nom_lieu" id="nom_lieu" placeholder="Nom Du Lieu...">
        </div>
        <div>
            <Label for ="numero civique">Numero Civique </label>    
            <input type="number" name="numero_civique" id="numero_civique" placeholder="Numero De Rue...">
        </div>
        <div>
            <Label for ="rue">Rue </label>    
            <input type="texte" name="rue" id="rue" placeholder="Nom De La Rue...">
        </div>
        <div>
            <Label for ="ville">Ville </label>    
            <input type="texte" name="ville" id="ville" placeholder="Nom De La Ville...">
        </div>
        <div>
            <Label for ="province">Province </label>    
            <input type="texte" name="province" id="province" placeholder="Nom De La Province...">
        </div>
        <div>
            <Label for ="Date Arrivee">Date Arrivee</label>    
            <input type="date" name="date_arrivee" id="Date Arrivee">
        </div>
        <div>
            <Label for ="Date Depart">Date Arrivee</label>    
            <input type="date" name="date_depart" id="Date Depart">
        </div>
        <input type="submit" name="valid_connection" value="Validation">
    </form> -->
    <!-- <script srcc="../js/scriptAjax.js"></script> -->
    
</body>
</html>