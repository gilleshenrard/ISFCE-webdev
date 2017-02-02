<?php
//utilisation de GET, POST et COOKIES sains (filtrés)
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST);

///UTILISATION MASSIVE DES COOKIES POUR LIMITER LES APPELS A LA DB
$cookie = filter_input_array(INPUT_COOKIE);

include_once './modeles/modele_db.php';

try{
    //connexion à la database (récupération de l'instance singleton)
    $database = new Db();
    $database->connect();

    //Si une requête POST a été envoyée, mise à jour directe
    if (!is_null($post)) {
        setcookie('v_id', $id);
        setcookie('v_ch', $post['numero_chassis']);
        setcookie('v_pl', $post['plaque']);
        setcookie('v_ma', $post['marque']);
        setcookie('v_mo', $post['modele']);
        setcookie('v_ty', $post['type']);
        $database->update_repa($post);
        $_POST = array();
    }
    else{   //sinon, mise à jour du cookie (si pas initialisé ou si l'id a changé -> autre véhicule)
        if (is_null($cookie) or $id!=$cookie['v_id']) {
            $v = $database->searchBy_ID("vehicules", $id);
            setcookie('v_id', $v['id']);
            setcookie('v_ch', $v['numero_chassis']);
            setcookie('v_pl', $v['plaque']);
            setcookie('v_ma', $v['marque']);
            setcookie('v_mo', $v['modele']);
            setcookie('v_ty', $v['type']);
        }
    }
    //Query database pour lister les réparations liées à la voiture
    $rep = $database->searchBy_FK("reparations", $id);
    //affichage
    include './vues/vehicule.php';
}
catch (PDOException $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}
catch (Exception $e){
    print "<h1>ERROR : ".$e->getMessage()."</h1>";
}