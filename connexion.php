<?php
//On demarre la session php
session_start();
if(!empty($_POST)){
    if(isset($_POST['pass']) && !empty($_POST['pass']) && 
        isset($_POST['email']) && !empty($_POST['email']))
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("Ce n'est pas un email");
        }

        // On hash le mot de passe 
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        // On enregistre en bd
        require_once 'includes/connect.php';
        $sql = "SELECT * FROM `users` WHERE `email` = :email ";
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch();

        //var_dump($user);die;
        if(!$user){
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }
        if(!password_verify($_POST["pass"], $user["pass"])){
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }
        
        // On lance la connexion de l'utilisateur
        
        //On stocker les informations de l'utilisateurs
        $_SESSION["user"]=[
            "id" => $user["id"],
            "pseudo" => $user["username"],
            "email" => $user["email"]
        ];
        //var_dump($_SESSION);
        header("Location: profil.php");

    }else{
        die("Le formulaire est incomplte");
    }
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title> PAGE DE RECENSEMENT</title>
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    
    <form method="post">
        <h1> Connexion </h1>
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
        <!-- <input type="password" name="form_password" placeholder="Mot de passe...">
        <input type="mail" name="form_mail" placeholder="Mail..."> -->
        
    </form>

</body>
</html>