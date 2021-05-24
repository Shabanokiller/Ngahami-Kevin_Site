<?php
require_once '../includes/connect.php';

if (isset($_POST['JSON']))
    $donnee = filter_input (INPUT_POST, 'JSON', FILTER_SANITIZE_SPECIAL_CHARS); //n'utilisez pas request


// $requete = file_get_contents("php://input");
// $object = json_decode($requete, true);


var_dump($donnee);



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