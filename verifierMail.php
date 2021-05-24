<?php
    if( !empty($_POST['email']))
    {

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            die("L'adresse email est incorrecte");
        }
        require_once '../includes/connect.php';
        $sql = "SELECT email INTO `users` WHERE `email` = :email";
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute();
        // $query->execute();

        require_once '../session/authentifier.classe.php';
        $resultat = $query->fetchAll(PDO::FETCH_OBJ);
        $ctn = 1;

        if($query -> rowCount() > 0)
        {
            echo"<span style='color:#fff'>Email existe deja.</span>";
            echo"<script>$('#submit').prop('disabled',true);</script>";
        }
        else{
            echo"<span style='color:#fff'>Email valide pour l'inscription.</span>";
            echo"<script>$('#submit').prop('disabled',true);</script>";
        }

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
?>