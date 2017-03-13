<?php
/**
 * Vérifie que le formatage et les valeurs de la date sont corrects
 * @param string $input
 * @return boolean
 */
function customCheckDate($input){
    //Vérifie si le formatage de la date est correct
    if(!preg_match('#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#', $input)){
        return FALSE;
    }
    else {
        //transforme la date au format yyyy-mm-dd en array et la vérifie avec checkdate()
        $inputInt = array_map('intval', explode('-', $input));
        return checkdate($inputInt[1], $inputInt[2], $inputInt[0]) ? $input : FALSE;
    }
}

//Récupération et assainissement de $_POST et $_GET
$args = array(
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'vehicule_FK' => FILTER_SANITIZE_NUMBER_INT,
    'del' => FILTER_SANITIZE_STRING,
    'date' => array(
		'filter' => FILTER_CALLBACK,
                'options' => 'customCheckDate')
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

//Connexion à la DB
include_once './modeles/modele_db.php';
$db_reparations = new Db("reparations");
$db_reparations->connect();

switch ($act) {
    case "new":     // Nouvelle réparation
        // Vérifie les filtres avec une variable temporaire
        $eval = $post;
        unset($eval['id']);
        if (!in_array(FALSE, $eval)) {
            //si aucune session ouverte, n'applique pas les changements
            if (isset($_SESSION) && isset($_SESSION["login"])) {
                $newid = $db_reparations->add($post);
                $post['id']=$newid;
            }
            $act="edit";
        }
        break;
    
        
    case "edit":     // Edition d'une réparation
        if(!in_array(FALSE, $post)){
            //si aucune session ouverte, n'applique pas les changements
            if (isset($_SESSION) && isset($_SESSION["login"])) {
                $db_reparations->update($post);
            }
        }
        else {
            throw new Exception("Valeur invalide dans un champ");
        }
        break;
    
        
    case "del":          // Suppression réparation
        if (!is_null($post)) {
            //si aucune session ouverte, n'applique pas les changements
            if (isset($_SESSION) && isset($_SESSION["login"])) {
                $db_reparations->delete($post['id'], 'id');
                header('Location: ?page=list');
            }
            else {
                throw new Exception("Vous devez être connecté pour pouvoir supprimer une réparation");
            }
        }
        else {
            throw new Exception($nullerror);
        }
        break;
    
        
    default:
        break;
}

if (isset($_SESSION) && isset($_SESSION['login'])) {
    //Script jQuery spécialisé pour la validation front-end des réparations
    echo "<script src='vues/scripts/reparation.js' type='text/javascript'></script>";
}

//Affichage
include './vues/reparation.php';