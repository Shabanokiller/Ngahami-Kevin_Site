<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: ../html/profil.php");
    exit;
}
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
        require_once '../includes/connect.php';
        $sql = "SELECT * FROM `users` WHERE `email` = :email ";
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();

        $user = $query->fetch();

        //var_dump($user);die;
        if(!$user){
            setcookie("Erreur","L'utilisateur et/ou le mot de passe est incorrect",time()+60);
            header("Location: ../html/connexion.php");
        }
        if(!password_verify($_POST["pass"], $user["pass"])){
            setcookie("Erreur","L'utilisateur et/ou le mot de passe est incorrect",time()+60);
            header("Location: ../html/connexion.php");
        }
        else{
            $_SESSION["user"]=[
                "id" => $user["id"],
                "pseudo" => $user["username"],
                "email" => $user["email"]
            ];
            //var_dump($_SESSION);
            header("Location: ../html/profil.php");
        }
        
        // On lance la connexion de l'utilisateur
        
        //On stocker les informations de l'utilisateurs
        

    }else{
        die("Le formulaire est incomplte");
    }
?>