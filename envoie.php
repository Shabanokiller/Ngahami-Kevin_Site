<?php
require_once './includes/connect.php';
$filename = './apps/receive.php';
$data = file_get_contents($filename);
$array = json_decode($data, true);

foreach($array as $row)
{
    $sql = "INSERT INTO `visite`(`Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`) 
            VALUES('".$row["lieu"]."', '".$row["civique"]."', '".$row["rue"]."', '".$row["ville"]."', '".$row["province"]."', '".$row["dateArrive"]."', '".$row["dateDepart"]."')";
    mysqli_query($db, $sql);
    
    // $query = $db->prepare($sql);
    // $query->execute();
}
echo "Insertion Reussi";
?>