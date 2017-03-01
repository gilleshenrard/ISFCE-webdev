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
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
$nullerror = "La page ne doit être atteinte que via les inputs fournis";

if (is_null($post)) {
    throw new Exception($nullerror);
}
 else {
    if (isset($post['del'])) {
        $act="del";
    }
     else {
        unset($post['del']);
    }
}

switch ($act) {
    case "new":
        $eval = $post;
        unset($eval['id']);
        if (!in_array(FALSE, $eval)) {
            $id = $database->add_reparation($post);
            $post['id']=$id;
            $act="edit";
        }
        break;
    
    case "edit":
        if(!in_array(FALSE, $post)){
            //Verification des données et update dans la DB
            $database->update_repa($post);
        }
        else {
            throw new Exception("Valeur invalide dans un champ");
        }
        break;
    
    case "del":
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