<?php
function make_list(){
    include './modeles/modele_db.php';
    try{
        $database = new Db();
        $database->connect();
        return $database->list_vehicles();
    } 
    catch (PDOException $e){
        print "<h1>ERROR : ".$e->getMessage()."</h1>";
    }
}