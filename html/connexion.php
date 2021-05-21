<?php
session_start();
    if(isset($_SESSION['user'])){
        header("Location: ../html/profil.php");
        exit;
    }

    if(isset($_COOKIE['erreur'])){
        $mess = $_COOKIE['erreur'];
        setcookie("Erreur"," ",time()-600);
    }


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title> PAGE DE RECENSEMENT</title>
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <?php

    if(isset($mess)){
        echo "<p>".$mess."<p>";
    }


    ?>  

    <div class="registration-form" >
        <form method="post" action="../session/authentifier.redirect.php">
            <h1> Connexion </h1>
            <div id="serverReponse">
                <div> 
                    <div class="inputs">
                        <!-- <Label for ="email">Email</label>     -->
                        <input type="texte" name="email" id="email" placeholder="Mail...">
                    </div>
                    <div>
                        <!-- <Label for ="password">Password</label>     -->
                        <input type="password" name="pass" id="pass" placeholder="Mot de passe...">
                    </div>
                </div>
                <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
                <div align="center">
                    <input type="submit" name="valid_connection" value="Connexion">
                </div>
            </div>  
            
            <!-- <input type="password" name="form_password" placeholder="Mot de passe...">
            <input type="mail" name="form_mail" placeholder="Mail..."> -->
            
        </form>
    </div>
    <!-- <script srcc="../js/scriptAjax.js"></script> -->
    
</body>
</html>