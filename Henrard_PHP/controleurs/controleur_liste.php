<?php
//Récupération et assainissement de $_POST pour 'plaque'
$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

switch ($search){
    case NULL:      //Pas de plaque recherchée
        $vehicles =  $database->list_table("vehicules");
        break;
    
    case FALSE:     //Erreur avec $_POST
        throw new Exception('Erreur à la recherche de la plaque');
        break;
    
    default :       //Mot-clef recherché
        $vehicles = $database->searchBy_All($search, "vehicules");
        if(sizeof($vehicles, 0) <= 0){
            $vehicles = (string)"<li class='list-group-item'><strong>Aucun véhicule trouvé</strong></li>";
        }
}
include './vues/liste_vehicules.php';
