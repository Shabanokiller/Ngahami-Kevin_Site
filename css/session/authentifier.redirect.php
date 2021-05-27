<?php
//session_start();
// if(isset($_SESSION['user'])){
//     header("Location: ../html/profil.php");
//     exit;
// }
if(isset($_POST['pass']) && !empty($_POST['pass']) && 
        isset($_POST['email']) && !empty($_POST['email']))
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            setcookie("erreur","Ce n'est pas un email",time()+60);
            header("Location: ../html/connexion.php");
            exit();
        }

        // On hash le mot de passe 
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        require_once '../includes/connect.php';
        $sql = "SELECT * FROM `users` WHERE `email` = :email ";
        $query = $db->prepare($sql);
        // $data = array();
        // while ($row = mysqli_fetch_assoc($query)){
        //     $data[] = $row;
        // }
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();
        
        // echo json_encode($data);
        require_once '../session/authentifier.classe.php';
        $user = $query->fetch();

        //var_dump($user);die;
        if(!$user){
            setcookie("erreur","L'utilisateur et/ou le mot de passe est incorrect",time()+60);
            header("Location: ../html/connexion.php");
        }
        if(!password_verify($_POST["pass"], $user["pass"])){
            setcookie("erreur","L'utilisateur et/ou le mot de passe est incorrect",time()+60);
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
        
        // On lance la connexion de l'utilisateur
        
        //On stocker les informations de l'utilisateurs
        
        //var_dump($_SESSION);

    }else{
        // setcookie("Erreur","Ce n'est pas un email",time()+60);
        setcookie("erreur","Vous devez vous inscrire un nom d'usager et un mot de passe.",time()+60);
        header("Location: ../html/connexion.php");
        exit();
    }
?>