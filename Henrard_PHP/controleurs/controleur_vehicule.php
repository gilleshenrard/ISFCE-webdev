<?php
//Définition des filtres à appliquer sur $_POST
$opt = array(
    'numero_chassis' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
                        //Vérification si structure = 12345-12345-12345-12345
                        return preg_match('#^([0-9]{5}-){3}[0-9]{5}$#',$input) ? $input : FALSE; }
        ),
    'plaque' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
                        //Vérification si structure = (1-)ABC-123 ou (1-)abc-123
                        return preg_match('#^(1-)?[A-Z]{3}-[0-9]{3}$#', strtoupper($input)) ? strtoupper($input) : FALSE; }
        ),
    'type' => array(
        'filter' => FILTER_CALLBACK,
        'options' => function($input){
                        //Vérification si valeur comprise dans les types prescrits
                        return in_array($input, array('Voiture','Moto','Camion','Camionette')) ? $input : FALSE; }
        ),
    'marque' => FILTER_SANITIZE_STRING,
    'modele' => FILTER_SANITIZE_STRING,
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'del' => FILTER_SANITIZE_STRING
);

//Récupération et assainissement de $_POST et $_GET
$post = filter_input_array(INPUT_POST, $opt);
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
$nullerror = "La page ne doit être atteinte que via les inputs fournis";

//Si suppression demandée, force la valeur du switch
if (!is_null($post) && isset($post['del'])) {
    $act="del";
}
else {
    //Sinon, nettoyage de 'del' dans l'array post
    unset($post['del']);
}

switch ($act){
    case "search":  //Recherche d'un véhicule
            if(isset($post['id'])){
                $post=$database->searchBy_ID("vehicules", $post['id']);
                $rep = $database->searchBy_Param($post['id'], "vehicule_FK", "reparations", TRUE);
                
                //lien vers page d'édition à la prochaine validation
                $act='edit';
            }
            else {
                throw new Exception('Aucun véhicule spécifié');
            }
            break;

    case "edit":    //Edition de vehicule
            //Si formulaire non-vide recu et pas d'erreur, update dans la DB
            if (!is_null($post)){
                if(!in_array(FALSE, $post)){
                    $database->update_veh($post);
                    $rep = $database->searchBy_Param($post['id'], "vehicule_FK", "reparations", TRUE);
                }
                else {
                    throw new Exception("Valeur invalide dans un champ");
                }
            }
            else {
                throw new Exception($nullerror);
            }
            break;
    
    case "new":     //Nouveau vehicule
            $rep = array();
            if(!is_null($post)){
                //Variable temporaire pour simplifier le test des filtres
                $eval = $post;
                unset($eval['id']);
                //Si aucune valeur incorrecte
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
    
    case "del": //Suppression d'un véhicule
        if (!is_null($post)) {
            //Suppression des réparations liées, puis suppression du véhicule
            $database->deleteAllBy_FK($post['id']);
            $database->delete($post['id'], 'vehicules');

            //Redirection par requête http vers la page de liste
            header('Location: ?page=list');
        }
        else {
            throw new Exception($nullerror);
        }
        break;

    default:
        throw new Exception($nullerror);
        break;
}

//Si session active
if (isset($_SESSION) && isset($_SESSION['login'])) {
    //Script jQuery spécialisé pour la validation front-end des véhicules
    echo "<script src='controleurs/scripts/vehicule.js' type='text/javascript'></script>";
}

//Prépare les options du menu déroulant pour les types de véhicules
$types_options =array();
foreach (array("Voiture", "Moto", "Camion", "Camionette") as $value) {
    if ($value == $post['type']) {
        $types_options[] = "<option value='".$value."' selected>".$value."</option>";
    }
    else {
        $types_options[] = "<option value='".$value."'>".$value."</option>";
    }
}

//Affichage des résultats
include './vues/vehicule.php';