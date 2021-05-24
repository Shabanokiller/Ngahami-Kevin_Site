<?php

// require_once '../html/visite.php';
if(isset($_POST['JSON']))
    $donnee = filter_input (INPUT_POST, 'JSON', FILTER_SANITIZE_SPECIAL_CHARS);

// else{
//     die("Veuillez entrez toutes les donnees");
// }
$obj = json_decode($_POST['JSON']);
$mail = $obj->mail;
$lieu = $obj->lieu;
$civique = $obj->civique;
$rue = $obj->rue;
$ville = $obj->ville;
$province = $obj->province;
$arr = $obj->dateArrivee;
$dep = $obj->dateDepart;
$pathologie = $obj->pathologie;
// echo $pathologie;
if(isset($lieu) && !empty($lieu) && 
    isset($civique) && !empty($civique) &&
    isset($rue) && !empty($rue) &&
    isset($ville) && !empty($ville) &&
    isset($province) && !empty($province) &&
    isset($arr) && !empty($arr) &&
    isset($dep) && !empty($dep)&&
    isset($mail) && !empty($mail)&&
    isset($pathologie) && !empty($pathologie))
        {

            require_once '../includes/connect.php';
            $sql = "UPDATE `visite` SET  `pathologie` = :pathologie WHERE `visite`.`Nom Du Lieu` = :lieu AND `visite`.`Numéro Civique` = :numero AND `visite`.`Rue` = :rue AND `visite`.`Ville` = :ville AND `visite`.`Province` = :province AND `visite`.`Date Arrivee` = :arrivee AND `visite`.`Date Depart` = :depart AND `visite`.`mail` = :mail";
            $query = $db->prepare($sql);
            $query->bindValue(":lieu", $lieu, PDO::PARAM_STR);
            $query->bindValue(":numero", $civique, PDO::PARAM_INT);
            $query->bindValue(":rue", $rue, PDO::PARAM_STR);
            $query->bindValue(":ville", $ville, PDO::PARAM_STR);
            $query->bindValue(":province",$province, PDO::PARAM_STR);
            $query->bindValue(":arrivee", $arr, PDO::PARAM_STR_CHAR);
            $query->bindValue(":depart", $dep, PDO::PARAM_STR_CHAR);
            $query->bindValue(":mail", $mail, PDO::PARAM_STR);
            $query->bindValue(":pathologie", $pathologie);
            $query->execute();  
        }
        else{
            die("Veuillez entrez toutes les donnees");
        }

?>