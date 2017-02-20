<?php
//Assainissement de $_GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

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
));

//Vérification des valeurs de $post
if(!is_null($post)){
    foreach ($post as $key => $value) {
        if (is_null($value)){
            throw new Exception('Valeur incorrecte pour '.$key);
        }
    }
    $v = $post;
    $v['id'] = $id;
}
else{
    $v = array(
        'id' => '',
        'numero_chassis' => '',
        'plaque' => '',
        'modele' => '',
        'marque' => '',
        'type' => '',
    );
}

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Si véhicule sélectionné à la page d'accueil
if (isset($id)) {
    //Si données saisies dans le formulaire, update dans la DB
    if(!is_null($post)){
        $database->update_veh($v);
    }
    //Sinon recherche par ID dans la DB
    else {
        $v = $database->searchBy_ID("vehicules", $id);
    }
    //Récupération des réparations correspondantes
    $rep = $database->searchBy_FK("reparations", $id);
}
else{
    $rep = array();
    if(!is_null($post)){
        echo '<h1>insert into DB</h1>';
        //INSERT INTO vehicules (...) VALUES (...)
    }
}

//Affichage des résultats
include './vues/vehicule.php';