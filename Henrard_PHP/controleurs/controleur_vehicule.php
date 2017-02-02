<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();
    $v = $database->searchBy_ID("vehicules", $id);
    include './vues/vehicule.php';
}
catch (PDOException $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}