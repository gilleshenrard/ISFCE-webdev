<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST);
include_once './modeles/modele_db.php';
include_once './controleurs/controleur_customfct.php';

$database = new Db();
$database->connect();

if (!is_null($post) and !isset($v)) {
    $v=array(
        'id' => $id,
        'numero_chassis' => $post['numero_chassis'],
        'plaque' => $post['plaque'],
        'marque' => $post['marque'],
        'modele' => $post['modele'],
        'type' => $post['type']
    );
    $database->update_veh($v);
    $_POST = array();
}
else {
    if (!isset($v)) {
        $v = $database->searchBy_ID("vehicules", $id);
    }
}
$rep = $database->searchBy_FK("reparations", $id);
include './vues/vehicule.php';