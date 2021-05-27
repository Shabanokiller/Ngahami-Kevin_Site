<?php
//session_start();
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

        // On enregistre en bd
        require_once '../includes/connect.php';
        $sql = "INSERT INTO `users`(`username`, `pass`, `email`) VALUES(:pseudo, '$pass', :email)";
        $query = $db->prepare($sql);
        $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();
        // $query->execute();

        require_once '../session/authentifier.classe.php';
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
            
            header("Location: ../html/profil.php");
        }
    }
    // else{
    //     setcookie("Erreur", "Vous devez inscrire un nom d'usager et un mot de passe.",time()+60)
    //     header("Location: ../connexion.php");
    // }
?>