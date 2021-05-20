<?php
// define("DBHOST", "localhost");
// define("DBUSER","root");
// define("DBPASS","");
// define("DBNAME", "authentification")
define("UTILISATEUR","root");
define("MDP","");
define("DSN","mysql:host=localhost; port=3306;dbname=authentification");


//$dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

try{

    $db = new PDO(DSN, UTILISATEUR, MDP);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(PDOException $e){
    error_log($e->getMessage());
}
