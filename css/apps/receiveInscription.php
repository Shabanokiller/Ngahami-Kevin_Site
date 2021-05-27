<?php

$joursFrancais = "moi";
// require_once '../html/visite.php';
if(isset($_POST['JSON']))
    $donnee = filter_input (INPUT_POST, 'JSON', FILTER_SANITIZE_SPECIAL_CHARS);


$obj = json_decode($_POST['JSON']);
$username = $obj->username;
$mail = $obj->mail;
$pass = $obj->pass;
// echo $username;
// echo $mail;
// $ville = $obj->ville;
// $province = $obj->province;
// $arr = $obj->dateArrivee;
// $dep = $obj->dateDepart;
$pseudo = strip_tags($username);
if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
    die("L'adresse email est incorrecte");
}

// On hash le mot de passe 
$password = password_hash($pass, PASSWORD_ARGON2ID);

// on filter l'adresse mail

// On enregistre en bd
require_once '../includes/connect.php';
$sql = "INSERT INTO `users`(`username`, `pass`, `email`) VALUES(:pseudo, '$pass', :email)";
$query = $db->prepare($sql);
$query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
$query->bindValue(":email", $mail, PDO::PARAM_STR);

$query->execute();
require_once '../session/authentifier.classe.php';
$user = $query->fetch();

//var_dump($user);die;
if(!$user){
    setcookie("Erreur","L'utilisateur et/ou le mot de passe est incorrect",time()+60);
    header("Location: ../html/connexion.php");
}
if(!password_verify($pass, $user["pass"])){
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


// require_once '../includes/connect.php';
// $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`) 
// VALUES(:lieu, :numero, :rue, :ville, :province, :arrivee, :depart)";
// $query = $db->prepare($sql);
// $query->bindValue(":lieu", $lieu, PDO::PARAM_STR);
// $query->bindValue(":numero", $civique, PDO::PARAM_INT);
// $query->bindValue(":rue", $rue, PDO::PARAM_STR);
// $query->bindValue(":ville", $ville, PDO::PARAM_STR);
// $query->bindValue(":province",$province, PDO::PARAM_STR);
// $query->bindValue(":arrivee", $arr, PDO::PARAM_STR_CHAR);
// $query->bindValue(":depart", $dep, PDO::PARAM_STR_CHAR);
// $query->execute();
// printf(" %s", $obj->lieu);
// printf("ALL DONE %s", $obj->civique);
var_dump(($_POST['JSON']));

// echo implode(",", $joursFrancais).filter_input(INPUT_POST, "Nom Du Lieu",FILTER_SANITIZE_SPECIAL_CHARS);
    //echo "Merci D'avoir mentionne " . $_POST['nom_lieu'] . ' ' . $_POST['numero_civique'] . ', says the php file';
// require_once '../includes/connect.php';

// if (isset($_POST['JSON']))
//     $donnee = filter_input (INPUT_POST, 'JSON', FILTER_SANITIZE_SPECIAL_CHARS); //n'utilisez pas request
//     require_once '../includes/connect.php';
//     $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`) 
//     VALUES(:lieu, :numero, :rue, :ville, :province, :arrivee, :depart)";
//     $query = $db->prepare($sql);
//     $query->bindValue(":lieu", $donnee['nom_lieu'], PDO::PARAM_STR);
//     $query->bindValue(":numero", $donnee['numero_civique'], PDO::PARAM_INT);
//     $query->bindValue(":rue", $donnee['rue'], PDO::PARAM_STR);
//     $query->bindValue(":ville", $donnee['ville'], PDO::PARAM_STR);
//     $query->bindValue(":province",$donnee['province'], PDO::PARAM_STR);
//     $query->bindValue(":arrivee", $donnee['Date Arrivee'], PDO::PARAM_STR_CHAR);
//     $query->bindValue(":depart", $donnee['Date Depart'], PDO::PARAM_STR_CHAR);
//     $query->execute();

// // $requete = file_get_contents("php://input");
// // $object = json_decode($requete, true);



// var_dump($donnee);



// require_once '../includes/connect.php';
// $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`) 
// VALUES(:lieu, :numero, :rue, :ville, :province, :arrivee, :depart)";
// $query = $db->prepare($sql);
// $query->bindValue(":lieu", $object['lieu'], PDO::PARAM_STR);
// $query->bindValue(":numero", $num, PDO::PARAM_INT);
// $query->bindValue(":rue", $rue, PDO::PARAM_STR);
// $query->bindValue(":ville", $ville, PDO::PARAM_STR);
// $query->bindValue(":province", $province, PDO::PARAM_STR);
// $query->bindValue(":arrivee", $arriv, PDO::PARAM_STR_CHAR);
// $query->bindValue(":depart", $dep, PDO::PARAM_STR_CHAR);
// $query->execute();
// require_once '../validationLieux.php';
?>