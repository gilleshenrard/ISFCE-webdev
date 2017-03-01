<?php
//Récupération et assainissement de $_POST et $_GET
$args = array(
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'date' => FILTER_SANITIZE_STRING,
    'vehicule_FK' => FILTER_SANITIZE_NUMBER_INT
);
$post = filter_input_array(INPUT_POST, $args);
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
$nullerror = "La page ne doit être atteinte que via les inputs fournis";

//Contrôle que la page est bien accédée via une autre page (-> $_POST non-nul)
if (is_null($post)) {
    throw new Exception($nullerror);
}
 else {
    //Si suppression demandée, force la valeur du switch
    if (isset($post['del'])) {
        $act="del";
    }
     else {
        //Sinon, retrait de 'del' pour ne pas parasiter le filtre
        unset($post['del']);
    }
}

switch ($act) {
    case "new":     // Nouvelle réparation
        // Variable temporaire pour simplifier la vérification des filtres
        $eval = $post;
        unset($eval['id']);
        if (!in_array(FALSE, $eval)) {
            $id = $database->add_reparation($post);
            $post['id']=$id;
            $act="edit";
        }
        break;
    
    case "edit":     // Edition d'une réparation
        if(!in_array(FALSE, $post)){
            //Verification des données et update dans la DB
            $database->update_repa($post);
        }
        else {
            throw new Exception("Valeur invalide dans un champ");
        }
        break;
    
    case "del":          // Suppression réparation
        if (!is_null($post)) {
            $database->delete($post[id], 'reparations');
            header('Location: ?page=list');
        }
        else {
            throw new Exception($nullerror);
        }
        break;
    
    default:
        break;
}

//Affichage
include './vues/reparation.php';