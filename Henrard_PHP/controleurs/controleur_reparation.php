<?php
//Récupération et assainissement de $_POST et $_GET
$args = array(
    'id' => FILTER_SANITIZE_NUMBER_INT,
    'intervention' => FILTER_SANITIZE_STRING,
    'description' => FILTER_SANITIZE_STRING,
    'date' => array(
		'filter' => FILTER_CALLBACK,
		'options' => function ($input){
						return preg_match('#(19|20)[0-9]{2}-(0[0-9]|1[12])-([0-2][0-9]|3[01])#', $input) ? $input : FALSE;}
	),
    'vehicule_FK' => FILTER_SANITIZE_NUMBER_INT,
    'del' => FILTER_SANITIZE_STRING
);
$post = filter_input_array(INPUT_POST, $args);
$act = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
$nullerror = "La page ne doit être atteinte que via les inputs fournis";

var_dump($post);

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
        // Variable temporaire pour simplifier la vérification des filtres
        $eval = $post;
        unset($eval['id']);
        //Si pas d'erreur ou de valeur vide (auquel cas, ne va pas commit dans la DB)
        if (!in_array(FALSE, $eval)) {
            //si aucune session ouverte, n'applique pas les changements
            if (isset($_SESSION) && isset($_SESSION["login"])) {
                //Ajout dans la DB + récupération de l'ID
                //  + lien vers la page d'édition, en cas de validation du formulaire
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
                //update dans la DB
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
        }
        else {
            throw new Exception($nullerror);
        }
        break;
    
    default:
        break;
}

//Si session active
if (isset($_SESSION) && isset($_SESSION['login'])) {
    //Script jQuery spécialisé pour la validation front-end des réparations
    echo '<link type="text/javascript" href="./controleurs/scripts/reparation.js" />';
}

//Affichage
include './vues/reparation.php';