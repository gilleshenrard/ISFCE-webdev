<?php
//Etablissement des filtres pour assainir $_POST
$args = array(
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
//Récupération filtrée de $_POST
$post = filter_input_array(INPUT_POST, $args);
//Récupération filtrée de $_GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Si aucun véhicule sélectionné à la page d'accueil
if (!isset($v)) {
    //Si des données ont été saisies dans le formulaire, vérification des filtres
    //  et update dans la DB
    if(!is_null($post)){
        foreach ($post as $key => $value) {
            if (is_null($value)){
                throw new Exception('Valeur incorrecte pour '.$key);
            }
        }
        $v = $post;
        $v['id'] = $id;
        $database->update_veh($v);
    }
    //Sinon recherche par ID dans la DB
    else {
        $v = $database->searchBy_ID("vehicules", $id);
    }
}
//Récupération des réparations correspondantes et affichage
$rep = $database->searchBy_FK("reparations", $id);
include './vues/vehicule.php';