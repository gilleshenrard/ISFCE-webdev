<?php
//Récupération et assainissement de $_GET et $_POST
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$args = array(
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'date' => FILTER_SANITIZE_STRING,
    'vehicule_FK' => FILTER_SANITIZE_NUMBER_INT
);
$post = filter_input_array(INPUT_POST, $args);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Si données saisies dans le formulaire
if(!is_null($post)){
    //Verification des données et update dans la DB
    foreach ($post as $key => $value) {
        if (is_null($value)){
            throw new Exception('Valeur incorrecte pour '.$key);
        }
    }
    $r=$post;
    $r['id'] = $id;
    $database->update_repa($r);
}
//Sinon, recherche par ID
else {
    $r = $database->searchBy_ID("reparations", $id);
}
//Affichage
include './vues/reparation.php';