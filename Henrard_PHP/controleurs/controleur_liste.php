<?php
//Récupération et assainissement de $_POST pour 'plaque'
$plate = filter_input(INPUT_POST, 'plaque', FILTER_SANITIZE_STRING);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

switch ($plate){
    case NULL:      //Pas de plaque recherchée
        $vehicles =  $database->list_table("vehicules");
        include './vues/liste_vehicules.php';
        break;
    
    case FALSE:     //Erreur avec $_POST
        throw new Exception('Erreur à la recherche de la plaque');
        break;
    
    default :       //Plaque recherchée
        $v = $database->searchBy_plaque("vehicules", $plate);
        if ($v != FALSE) {
            //Plaque trouvée -> affichage du véhicule
            include './controleurs/controleur_vehicule.php';
        }
}