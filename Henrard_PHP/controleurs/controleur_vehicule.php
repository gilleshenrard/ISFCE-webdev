<?php
//Définition des filtres à appliquer sur $_POST
$opt = array(
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
    'id' => FILTER_SANITIZE_NUMBER_INT
);

//Récupération et assainissement de $_POST et $_GET
$post = filter_input_array(INPUT_POST, $opt);
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
$nullerror = "La page ne doit être atteinte que via les inputs fournis";

switch ($act){
    case "search":
            if(isset($post['id'])){
                $post=$database->searchBy_ID("vehicules", $post['id']);
                $act='edit';
            }
            $rep = $database->searchBy_FK("reparations", $post['id']);
            break;

    case "edit":    //Edition de vehicule
            //Si formulaire non-vide recu, update dans la DB
            if (!is_null($post) && !in_array(FALSE, $post)) {
                $database->update_veh($post);
            }
            else {
                throw new Exception($nullerror);
            }
            $rep = $database->searchBy_FK("reparations", $post['id']);
            break;
    
    case "new":     //Nouveau vehicule
            $rep = array();
            if(!is_null($post)){
                //Variable temporaire pour simplifier le test des filtres
                $eval = $post;
                unset($eval['id']);
                if(!in_array(FALSE, $eval)){
                    //Ajout dans la DB + recuperation de l'ID cree
                    $id = $database->add_vehicle($post);
                    $post['id']=$id;
                    //Redirection de la prochaine page vers la page d'edition
                    $act="edit";
                }
                else {
                    throw new Exception("Valeur invalide entrée dans le formulaire");
                }
            }
            break;
    
    case "del":
        if (!is_null($post)) {
            $database->delete($post[id], 'vehicules');
            header('Location: ?page=list');
        }
        break;

    default:
        throw new Exception($nullerror);
        break;
}

//Affichage des résultats
include './vues/vehicule.php';