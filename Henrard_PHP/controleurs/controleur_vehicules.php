<?php
$post = filter_input_array(INPUT_POST);
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();
    
    if (!is_null($post)) {
        $v = $database->searchBy_plaque("vehicules", $post['plaque']);
        include './controleurs/controleur_vehicule.php';
    }
    else {
       $vehicles =  $database->list_table("vehicules");
       include './vues/liste_vehicules.php';
    }
}
catch (PDOException $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}