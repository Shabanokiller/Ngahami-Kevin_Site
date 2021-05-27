<?php
session_start();



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> PAGE DE RECENSEMENT</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleInscription.css">
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <div class="registration-form" >
        <h1> Inscription </h1>

        <form method="post" action="../session/CreerUsager.vide.php">
            <div>
                <Label for ="Pseudo">Pseudo</label>    
                <input type="text" name="nickname" id="pseudo" placeholder="pseudo...">
            </div>
            <div>
                <Label for ="email">Email</label>    
                <input type="email" name="email" id="email" placeholder="Mail...">
            </div>
            <div>
                <Label for ="password">Password</label>    
                <input type="password" name="pass" id="pass" placeholder="Mot de passe...">
            </div>
            <!-- <input type="password" name="form_password" placeholder="Mot de passe...">
            <input type="mail" name="form_mail" placeholder="Mail..."> -->
            <div align="center">
            <input type="submit" name="valid_connection" value="Connexion">
            </div>
        </form>
    </div>
    

</body>
</html>