<?php
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();
    $vehicles =  $database->list_table("vehicules");
    include './vues/liste_vehicules.php';
}
catch (PDOException $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}