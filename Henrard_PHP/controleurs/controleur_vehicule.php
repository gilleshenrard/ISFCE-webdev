<?php
//include_once './controleurs/controleur_customfct.php';

$args = array(
    'id' => FILTER_VALIDATE_INT,
    'numero_chassis' => FILTER_SANITIZE_STRING,
    'plaque' => FILTER_SANITIZE_STRING,
    'marque' => FILTER_SANITIZE_STRING,
    'modele' => FILTER_SANITIZE_STRING,
    'type' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($type){
            return in_array($type, array('Voiture', 'Moto', 'Camion', 'Camionette')) ? $type : null;
        }
    )
);
$post = filter_input_array(INPUT_POST, $args);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

if (!isset($v)) {
    if(!is_null($post)){
        $v = $post;
        $v['id'] = $id;
        $database->update_veh($v);
    }
    else {
        $v = $database->searchBy_ID("vehicules", $id);
    }
}
$rep = $database->searchBy_FK("reparations", $id);
include './vues/vehicule.php';