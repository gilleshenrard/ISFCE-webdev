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
var_dump($post);
        
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

switch ($act){
    case "edit":
        echo "<h1>EDIT</h1>";
        break;
    
    case "new":
        $rep = array();
        if(!is_null($post)){
            $eval = $post;
            unset($eval['id']);
            if(!in_array(FALSE, $eval)){
                echo "<h1>AJOUT</h1>";
                $id = $database->add_vehicle($post);
                $post['id']=$id;
                $act="edit";
            }
            else {
                throw new Exception("Valeur invalide entrée dans le formulaire");
            }
        }
        break;
    
    case "del":
        echo "<h1>DELETE</h1>";
        break;
    
    case FALSE:
    case null:
        throw new Exception("La page ne doit être atteinte que via les inputs fournis");
        break;
}
        
        
        
        
        
        
        
        
        
        
        
        
        
/*        
//Vérification des valeurs de $post
if (!is_null($post) and in_array(FALSE, $post)) {
    throw new Exception("Valeur incorrecte entrée dans le formulaire");
}

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();

//Si un véhicule a été sélectionné dans la liste
if($page == "vehicule"){
    if (!is_null($post)) {
        $database->update_veh($post);
    }
    $rep = $database->searchBy_FK("reparations", $post['id']);
    $action = "vehicule";
}
//Sinon, création d'un nouveau
else{
    $rep = array();
    if (!is_null($post)) {
        $id = $database->add_vehicle($post);
        $post['id'] = $id['id'];
        $action = "vehicule";
    }
    else {
        $action = "new-vehicule";
    }
}
*/
//Affichage des résultats
include './vues/vehicule.php';