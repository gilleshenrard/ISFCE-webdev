<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST);
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();
    
    if(!is_null($post)){
        $r=array(
            'id' => $id,
            'intervention' => $post['intervention'],
            'description' => $post['description'],
            'date' => $post['date'],
            'vehicule_FK' => $post['vehicule_FK']
        );
        $database->update_repa($r);
        $_POST = array();
    }
    else {
        $r = $database->searchBy_ID("reparations", $id);
    }
    include './vues/reparation.php';
}
catch (PDOException $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    echo "<h1>ERROR : ".$e->getMessage()."</h1>";
}