<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: ../html/connexion.php");
    exit;
}
unset($_SESSION["user"]);
session_destroy();
header("Location: ../html/index.php");