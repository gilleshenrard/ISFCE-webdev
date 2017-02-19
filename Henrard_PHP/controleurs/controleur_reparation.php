<?php
//include_once './controleurs/controleur_customfct.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$args = array(
    'id' => FILTER_VALIDATE_INT,
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'date' => FILTER_SANITIZE_STRING,
    'vehicule_FK' => FILTER_VALIDATE_INT
);
$post = filter_input_array(INPUT_POST, $args);

include_once './modeles/modele_db.php';
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
}
else {
    $r = $database->searchBy_ID("reparations", $id);
}
include './vues/reparation.php';