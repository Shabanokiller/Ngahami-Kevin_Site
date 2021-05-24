<?php
// session_start();
    require_once '../includes/connect.php';
    if(!isset($_SESSION["user"])){
        header("Location: ../html/connexion.php?error1");
        exit;
    }
    // $afficherProfil = $db->query("SELECT * FROM users WHERE id = ?", 
    //     array($_SESSION["user"]));
    include_once "../navbar/navbar.php";
    // $afficherProfil = $afficherProfil->fetch();
    if(!empty($_POST))
    {
        if(isset($_POST['nom_lieu']) && !empty($_POST['nom_lieu']) && 
            isset($_POST['numero_civique']) && !empty($_POST['numero_civique']) &&
            isset($_POST['rue']) && !empty($_POST['rue']) &&
            isset($_POST['ville']) && !empty($_POST['ville']) &&
            isset($_POST['province']) && !empty($_POST['province']) &&
            isset($_POST['date_arrivee']) && !empty($_POST['date_arrivee']) &&
            isset($_POST['date_depart']) && !empty($_POST['date_depart']))
        {
            $lieu = strip_tags($_POST["nom_lieu"]);
            $num = strip_tags($_POST["numero_civique"]);
            $rue = strip_tags($_POST["rue"]);
            $ville = strip_tags($_POST["ville"]);
            $province = strip_tags($_POST["province"]);
            $arriv = strip_tags($_POST["date_arrivee"]);
            $dep = strip_tags($_POST["date_depart"]);
            // if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            // {
            //     die("Ce n'est pas un email");
            // }
    
            // On hash le mot de passe 
            // $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
    
            // On enregistre en bd
            // On enregistre en bd
            require_once '../includes/connect.php';
            $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`) 
            VALUES(:lieu, :numero, :rue, :ville, :province, :arrivee, :depart)";
            $query = $db->prepare($sql);
            $query->bindValue(":lieu", $lieu, PDO::PARAM_STR);
            $query->bindValue(":numero", $num, PDO::PARAM_INT);
            $query->bindValue(":rue", $rue, PDO::PARAM_STR);
            $query->bindValue(":ville", $ville, PDO::PARAM_STR);
            $query->bindValue(":province", $province, PDO::PARAM_STR);
            $query->bindValue(":arrivee", $arriv, PDO::PARAM_STR_CHAR);
            $query->bindValue(":depart", $dep, PDO::PARAM_STR_CHAR);
            $query->execute();
            // $updat = $db->prepare('UPDATE visite SET Nom Du Lieu = :nomupdat , Numero Civique = :possesseurupdat , Rue = :consoleupdat , Ville = :prixupdat , Province = :commentairesupdate, Date Arrivee = :arrivee, Date Depart = :depart WHERE ID = :idupdat ');
            // $updat->execute(array(
            // 'nomupdat' => $nomupdat ,
            // 'possesseurupdat' => $possesseurupdat ,
            // 'consoleupdat' => $consoleupdat ,
            // 'prixupdat'=> $prixupdat ,
            // 'idupdat'=> $idupdat,
            // 'commentairesupdat'=>$commentairesupdat ));

            
            //var_dump($user);die;
            // if(!$user){
            //     die("L'utilisateur et/ou le mot de passe est incorrect");
            // }
            // if(!password_verify($_POST["pass"], $user["pass"])){
            //     die("L'utilisateur et/ou le mot de passe est incorrect");
            // }
            
            // // On lance la connexion de l'utilisateur
            
            // //On stocker les informations de l'utilisateurs
            // $_SESSION["user"]=[
            //     "id" => $user["id"],
            //     "pseudo" => $user["username"],
            //     "email" => $user["email"]
            // ];
            // //var_dump($_SESSION);
            // header("Location: profil.php");
    
        }else{
            die("Toous les champs ne sont pas saisies");
        }
    }
?>