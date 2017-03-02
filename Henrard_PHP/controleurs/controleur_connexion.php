<?php

//Récupération et assainissement de $_POST et $_GET
$opt = array(
    'login' => FILTER_SANITIZE_STRING,
    'password' => FILTER_SANITIZE_STRING
);
$post = filter_input_array(INPUT_POST, $opt);
$act = filter_input(INPUT_GET, 'act', FILTER_SANITIZE_STRING);

//encadrement de la structure de la barre de navigation
echo '<nav class="navbar navbar-inverse navbar-fixed-top">';
echo '<div class="container">';

//Affichage du logo principal
include './vues/menu_header_footer/menu.php';

//Si aucune session n'existe
if(!isset($_SESSION) || sizeof($_SESSION, 0) <= 0) {
    if (is_null($post)) {
            include './vues/menu_header_footer/connexion.php';
    }
    else {
        //recherche du login dans la DB et update de la session si password OK
        $login = $database->search_user($post['login']);
        if (sizeof($login, 0) > 0) {
            if ($login['password'] == $post["password"]) {
                $_SESSION['login']=$login['password'];
            }
            else {
                throw new Exception('Mot de passe incorrect');
            }
        }
        else {
            throw new Exception("Utilisateur non-trouvé");
        }
    }
}

//Si une session est ouverte
if (isset($_SESSION) && isset($_SESSION['login'])) {
    if ($act=='deco') {
        //Destruction si le bouton de déconnexion est cliqué
        session_unset();
        session_destroy();
        
        //Affichage de l'interface de connexion
        include './vues/menu_header_footer/connexion.php';
    }
    else {
        //Affichage de l'interface de déconnexion
        include './vues/menu_header_footer/greetings.php';
    }
}

//Fermeture de la barre de navigation
echo '</div>';
echo '</nav>';
