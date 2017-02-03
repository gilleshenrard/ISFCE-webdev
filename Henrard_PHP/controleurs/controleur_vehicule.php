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
    var_dump($_COOKIE);

    //Si une requête POST a été envoyée, mise à jour directe
    if (!is_null($post)) {
        echo "<h1>BP1</h1>";
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
            echo "<h1>BP2</h1>";
            $v = $database->searchBy_ID("vehicules", $id);
            var_dump($id);
            var_dump($v);
            $_COOKIE['v_id'] = $v['id'];
            $_COOKIE['v_ch'] = $v['numero_chassis'];
            $_COOKIE['v_pl'] = $v['plaque'];
            $_COOKIE['v_ma'] = $v['marque'];
            $_COOKIE['v_mo'] = $v['modele'];
            $_COOKIE['v_ty'] = $v['type'];
            var_dump($_COOKIE);
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