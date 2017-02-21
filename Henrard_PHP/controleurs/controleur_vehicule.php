<?php

//Assainissement de $_POST à l'aide de filtres
$post = filter_input_array(INPUT_POST, array(
    'numero_chassis' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
                        return preg_match('#^([0-9]{5}-){3}[0-9]{5}$#',$input) ? $input : null; }
        ),
    'plaque' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
            return preg_match('#^(1-)?[A-Z]{3}-[0-9]{3}$#',$input) ? $input : null; }
        ),
    'type' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
            return in_array($input, array('Voiture','Moto','Camion','Camionette')) ? $input : null; }
        ),
    'marque' => FILTER_SANITIZE_STRING,
    'modele' => FILTER_SANITIZE_STRING,
    'id' => FILTER_SANITIZE_NUMBER_INT,
));
if (!is_null($post) and in_array(FALSE, $post)) {
    throw new Exception("Valeur incorrecte entrée dans le formulaire");
}

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Vérification des valeurs de $post
if($page == "vehicle"){
    $database->update_veh($post);
    $rep = $database->searchBy_FK("reparations", $post['id']);
    $action = "vehicle";
}
else{
    $rep = array();
    if (!is_null($post)) {
        // INSERT INTO table VALUES
    }
    $action = "new";
}

//Affichage des résultats
include './vues/vehicule.php';