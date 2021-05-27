<?php

    require_once '../includes/connect.php';
    $filename = '../apps/receive.php';
    $data = file_get_contents($filename);
    $sql = "SELECT * FROM `users` WHERE `email` = :email ";
    $query = mysqli_query($db, $sql);
    // $query = $db->prepare($sql);
    // $array = json_decode($data, true);

    while( $row = mysqli_fetch_assoc($query)){
        echo $row;
    }

?>