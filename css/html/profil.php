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

    

    
</body>
</html>