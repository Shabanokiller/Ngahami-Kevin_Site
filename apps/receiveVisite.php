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

if(isset($lieu) && !empty($lieu) && 
    isset($civique) && !empty($civique) &&
    isset($rue) && !empty($rue) &&
    isset($ville) && !empty($ville) &&
    isset($province) && !empty($province) &&
    isset($arr) && !empty($arr) &&
    isset($dep) && !empty($dep))
        {

            require_once '../includes/connect.php';
            $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail`, `pathologie`) 
            VALUES(:lieu, :numero, :rue, :ville, :province, :arrivee, :depart, :mail, '')";
            // $sql = "UPDATE `visite` SET `Nom Du Lieu` = :lieu, `Numéro Civique` = :numero, `Rue` = :rue, `Ville` = :ville, `Province` =:province, `Date Arrivee` = :arrivee, `Date Depart` = :depart, `mail` = :mail";
            $query = $db->prepare($sql);
            $query->bindValue(":lieu", $lieu, PDO::PARAM_STR);
            $query->bindValue(":numero", $civique, PDO::PARAM_INT);
            $query->bindValue(":rue", $rue, PDO::PARAM_STR);
            $query->bindValue(":ville", $ville, PDO::PARAM_STR);
            $query->bindValue(":province",$province, PDO::PARAM_STR);
            $query->bindValue(":arrivee", $arr, PDO::PARAM_STR_CHAR);
            $query->bindValue(":depart", $dep, PDO::PARAM_STR_CHAR);
            $query->bindValue(":mail", $mail, PDO::PARAM_STR);
            $query->execute();  
        }
        else{
            die("Veuillez entrez toutes les donnees");
        }
// printf(" %s", $obj->lieu);
// printf("ALL DONE %s", $obj->civique);
// var_dump($obj);
?>