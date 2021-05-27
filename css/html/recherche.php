<?php
session_start();
require_once '../includes/connect.php';
require_once '../validationLieux.php';
// require_once '../session/authentifier.classe.php';
$data =  $_SESSION["user"]["email"];
$sql = "SELECT `id`, `Nom Du Lieu`, `Numéro Civique`, `Rue`, `Ville`, `Province`, `Date Arrivee`, `Date Depart`, `mail` FROM `visite` where visite.mail LIKE '$data'";

$query = $db->prepare($sql);
$query -> execute(array());
$query = $query->fetchAll();
?>

<html>
<head>
    <link rel="stylesheet" href="../css/styleNave.css">
    <link rel="stylesheet" href="../css/styleLieux.css">
</head>
<body>
<h2>LISTE DES VILLES SAISIES PAR <?= $_SESSION["user"]["email"] ?></h2>
<form methos="GET">
    <!-- <input type="search" id="recherche"placeholder="Recherche" onkeyup="rechercheune(this.value)">
    <input type="submit" value="Recherche">
    <div id="resultats"></div> -->
    
    <table class="tableau-style">
        <thead>
            <tr>
                <th>
                    Lieu
                </th>
                <th>
                    Civique
                </th>
                <th>
                    Rue
                </th> 
                <th>
                    Ville
                </th> 
                <th>
                    Province
                </th> 
                <th>
                    Date Arrivee
                </th> 
                <th>
                    Date Depart
                </th> 
                <th>
                    Voir le lieu
                </th></br>
            </tr>
        </thead>
        <?php
            foreach($query as $ap){
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $ap['Nom Du Lieu'] ?> 
                        </td>
                        <td>
                            <?= $ap['Numéro Civique'] ?>
                        </td>
                        <td>
                            <?= $ap['Rue'] ?> 
                        </td>
                        <td>
                            <?= $ap['Ville'] ?>
                        </td>
                        <td>
                            <?= $ap['Province'] ?> 
                        </td>
                        <td>
                            <?= $ap['Date Arrivee'] ?>
                        </td>
                        <td>
                            <?= $ap['Date Depart'] ?>
                        </td>
                        <td>
                            <a href="lieux.php?id=<?= $ap['id']?> ">Voir le lieu</a></br>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
        
        ?>
    </table>
<form>
    <!-- <script src="../js/ajax.js"></script> -->
</body>
</html>