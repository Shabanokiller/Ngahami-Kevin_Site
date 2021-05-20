<?php
session_start();
if(!empty($_POST)){
    if(isset($_POST['nickname']) && !empty($_POST['nickname']) &&
        isset($_POST['pass']) && !empty($_POST['pass']) && 
        isset($_POST['email']) && !empty($_POST['email']))
    {
        $pseudo = strip_tags($_POST["nickname"]);
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("L'adresse email est incorrecte");
        }

        // On hash le mot de passe 
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        // on filter l'adresse mail
        //filter_var()

        // On enregistre en bd
        require_once 'includes/connect.php';
        $sql = "INSERT INTO `users`(`username`, `pass`, `email`) VALUES(:pseudo, '$pass', :email)";
        $query = $db->prepare($sql);
        $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        //On recupere l'id du nouvelle utilisateur
        $id = $db->lastInsertId();

        // On lance la connexion de l'utilisateur
        
        //On stocker les informations de l'utilisateurs
        $_SESSION["user"]=[
            "id" => $id,
            "pseudo" => $pseudo["username"],
            "email" => $_POST["email"]
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
    <title> PAGE DE RECENSEMENT</title>
    <link rel="stylesheet" href="./css/styleInscription.css">
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <div class="registration-form">
        <h1> Inscription </h1>

        <form method="post">
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