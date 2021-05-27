<?php
session_start();
require_once '../includes/connect.php';
// require_once '../session/authentifier.classe.php';
$data =  $_SESSION["user"]["email"];
echo $data;
$go = "%".$_GET['recherche']."%"
$sql = "SELECT `Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail` FROM `visite`, `users` where visite.mail LIKE '$data' ";

$query = $db->prepare($sql);
$query -> execute(array());
if($query->rowCount() >=1)
{
    while($query1 = $query->fetch()){
        ?>
        <?php echo $query1['Nom Du Lieu'] ?>
        <?php
    }
}else{
    echo "Aucun resultat trouve!"
}
?>