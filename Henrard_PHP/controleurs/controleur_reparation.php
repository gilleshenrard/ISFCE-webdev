<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();
    $r = $database->searchBy_ID("reparations", $id);
    include './vues/reparation.php';
}
catch (PDOException $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}