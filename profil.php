<?php
    session_start();
    require_once 'includes/connect.php';
    if(!isset($_SESSION["user"])){
        header("Location: connexion.php?error1");
        exit;
    }
    // $afficherProfil = $db->query("SELECT * FROM users WHERE id = ?", 
    //     array($_SESSION["user"]));
    include_once "./navbar.php";
    // $afficherProfil = $afficherProfil->fetch();
    if(isset($_GET['user'])){
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
            require_once 'includes/connect.php';
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
            // $updat = $db->prepare('UPDATE visite SET Nom Du Lieu = :nomupdat , Numero Civique = :possesseurupdat , Rue = :consoleupdat , Ville = :prixupdat , Province = :commentairesupdate, Date Arrivee = :arrivee, Date Depart = :depart WHERE ID = :idupdat ');
            // $updat->execute(array(
            // 'nomupdat' => $nomupdat ,
            // 'possesseurupdat' => $possesseurupdat ,
            // 'consoleupdat' => $consoleupdat ,
            // 'prixupdat'=> $prixupdat ,
            // 'idupdat'=> $idupdat,
            // 'commentairesupdat'=>$commentairesupdat ));

            $query->execute();;
            
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
            die("Aucun utilisateur defini");
        }
    }


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> PAGE DE RECENSEMENT</title>
<head>
<body>
    <!-- <h1> ACCEUIL </h1>

    <p> BIENEVNUE </P>

    <hr> -->
    <h2> Profil de <?= $_SESSION["user"]["pseudo"] ?> </h2>

    <p>Pseudo: <?= $_SESSION["user"]["pseudo"] ?>  </p>
    <p>Email: <?= $_SESSION["user"]["email"] ?>  </p>

    <form method="get" action="recherche.php">
        Recherche : <input type="search" name="cherhce">
        <input type="submit" value="Recherche">
    </form>

    <form method="post">
        <div>
            <Label for ="Lieu">Nom DU Lieu</label>    
            <input type="texte" name="nom_lieu" id="nom_lieu" placeholder="Nom Du Lieu...">
        </div>
        <div>
            <Label for ="numero civique">Numero Civique </label>    
            <input type="texte" name="numero_civique" id="numero_civique" placeholder="Numero De Rue...">
        </div>
        <div>
            <Label for ="rue">Rue </label>    
            <input type="texte" name="rue" id="rue" placeholder="Nom De La Rue...">
        </div>
        <div>
            <Label for ="ville">Ville </label>    
            <input type="texte" name="ville" id="ville" placeholder="Nom De La Ville...">
        </div>
        <div>
            <Label for ="province">Province </label>    
            <input type="texte" name="province" id="province" placeholder="Nom De La Province...">
        </div>
        <div>
            <Label for ="Date Arrivee">Date Arrivee</label>    
            <input type="date" name="date_arrivee" id="Date Arrivee">
        </div>
        <div>
            <Label for ="Date Depart">Date Arrivee</label>    
            <input type="date" name="date_depart" id="Date Depart">
        </div>
        <input type="submit" name="valid_connection" value="Validation">
    </form>

</body>
</html>