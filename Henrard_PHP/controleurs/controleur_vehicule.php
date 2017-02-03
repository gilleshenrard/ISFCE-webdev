<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST);
include_once './modeles/modele_db.php';

try{
    $database = new Db();
    $database->connect();

    if (!is_null($post)) {
        $v=array(
            'id' => $id,
            'numero_chassis' => $post['numero_chassis'],
            'plaque' => $post['plaque'],
            'marque' => $post['marque'],
            'modele' => $post['modele'],
            'type' => $post['type']
        );
        $database->update_repa($v);
        $_POST = array();
    }
    else {
        $v = $database->searchBy_ID("vehicules", $id);
    }
    $rep = $database->searchBy_FK("reparations", $id);
    include './vues/vehicule.php';
}
catch (PDOException $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}