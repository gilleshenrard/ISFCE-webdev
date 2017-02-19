<?php
//include_once './controleurs/controleur_customfct.php';

function validate_type($str){
    return in_array($str, array('Voiture', 'Moto', 'Camion', 'Camionette')) ? $str : FALSE;
}

$args = array(
    'id' => FILTER_VALIDATE_INT,
    'numero_chassis' => FILTER_SANITIZE_STRING,
    'plaque' => FILTER_SANITIZE_STRING,
    'marque' => FILTER_SANITIZE_STRING,
    'modele' => FILTER_SANITIZE_STRING,
    'type' => array(
        'filter' => FILTER_CALLBACK,
        'options' => validate_type
    )
);
$post = filter_input_array(INPUT_POST, $args);
if ($post == FALSE) {
    throw new Exception('Erreur à la réception du formulaire');
}

include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

if (!is_null($post)) {
    foreach ($post as $key => $value) {
        if ($value == NULL or $value == FALSE) {
            throw new Exception('Valeur nulle ou incorrecte pour '+$key);
        }
    }

    $v = $database->searchBy_plaque("vehicules", $post['plaque']);
    if ($v != FALSE) {
        include './controleurs/controleur_vehicule.php';
    }
}
else {
   $vehicles =  $database->list_table("vehicules");
   include './vues/liste_vehicules.php';
    }