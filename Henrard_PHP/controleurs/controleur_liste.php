<?php
//include_once './controleurs/controleur_customfct.php';

$plate = filter_input(INPUT_POST, 'plaque', FILTER_SANITIZE_STRING);

include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

if (!is_null($plate)) {
    $v = $database->searchBy_plaque("vehicules", $plate);
    if ($v != FALSE) {
        include './controleurs/controleur_vehicule.php';
    }
}
else {
   $vehicles =  $database->list_table("vehicules");
   include './vues/liste_vehicules.php';
}