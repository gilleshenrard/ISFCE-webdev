<?php
//Récupération et assainissement de $_POST
$args = array(
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'date' => FILTER_SANITIZE_STRING,
    'vehicule_FK' => FILTER_SANITIZE_NUMBER_INT
);
$post = filter_input_array(INPUT_POST, $args);

//Vérification des valeurs de $post
if (!is_null($post) and in_array(FALSE, $post)) {
    throw new Exception("Valeur incorrecte entrée dans le formulaire");
}

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Si données saisies dans le formulaire
if(!is_null($post)){
    //Verification des données et update dans la DB
    $database->update_repa($post);
}
//Affichage
include './vues/reparation.php';