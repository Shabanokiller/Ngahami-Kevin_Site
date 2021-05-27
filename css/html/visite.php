<?php
    session_start();
    require_once '../validationLieux.php';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> PAGE DE RECENSEMENT</title>
    <link rel="stylesheet" href="../css/styleNave.css">
    <link rel="stylesheet" href="../css/styleForm.css">
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->

    <!-- <form method="get" action="recherche.php">
        Recherche : <input type="search" name="cherhce">
        <input type="submit" value="Recherche">
    </form> -->
    <div class="form">
        <form id="form" method="POST" action="#">
            <div>
                <Label for ="Email">Email</label>    
                <input type="email" name="mail" id="mail" value="<?= $_SESSION["user"]["email"] ?>" placeholder="email...">
            </div>
            <div>
                <Label for ="Lieu">Nom du lieu</label>    
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
                <input type="datetime-local" name="date_arrivee" id="Date Arrivee">
            </div>
            <div>
                <Label for ="Date Depart">Date Depart</label>    
                <input type="datetime-local" name="date_depart" id="Date Depart">
            </div>
            <!-- <button id="btn" name="valid_connection" onclick="postAjax();"> Valider </button> -->
            <div id="status"></div>
            <input type="submit" id="btn" name="valid_connection" value="Validation">
            <!-- <div id="msg">
                <pre></pre>
            </div> -->
        </form>
    </div>
    <!-- <script src="../js/java.js"></script> -->
    <!-- <script src="../js/envoie.js"></script>  -->
    <script src="../js/envoieDonnees.js"></script>
    <!-- <script src="../js/ajax.js"></script> -->
</body>
</html>