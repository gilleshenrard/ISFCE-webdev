<?php

//Récupération et assainissement de $_POST et $_GET
$opt = array(
    'login' => FILTER_SANITIZE_STRING,
    'password' => FILTER_SANITIZE_STRING
);
$post = filter_input_array(INPUT_POST, $opt);
$act = filter_input(INPUT_GET, 'act', FILTER_SANITIZE_STRING);

if ($act=="connexion" && (is_null($post) || in_array('', $post))) {
    throw new Exception('Valeurs de connexion incorrectes');
}

//encadrement de la structure de la barre de navigation
echo '<nav class="navbar navbar-inverse navbar-fixed-top">';
echo '<div class="container">';

//Affichage du logo principal
include './vues/menu_header_footer/menu.php';

$input_disabled = "disabled";
switch ($act) {
    case "connexion":       //Connexion
        if(!isset($_SESSION) || sizeof($_SESSION, 0) <= 0) {
            //recherche du login dans la DB et update de la session si password OK
            $login = $database->search_user($post['login']);
            if (sizeof($login, 0) > 0) {
                if ($login['password'] == $post["password"]) {
                    $_SESSION['login']=$login['login'];
                    $input_disabled="";
                    include './vues/menu_header_footer/greetings.php';
                }
                else {
                    throw new Exception('Mot de passe incorrect');
                }
            }
            else {
                throw new Exception("Utilisateur non-trouvé");
            }
        }
        else {
            throw new Exception('Session déjà en cours');
        }
        break;
    
    case "deconnexion":     //Déconnexion de la session
        session_unset();
        session_destroy();
        
        //Affichage de l'interface de connexion
        include './vues/menu_header_footer/connexion.php';
        break;

    default:
        if (isset($_SESSION) && isset($_SESSION['login'])) {
            //Affichage de l'interface de déconnexion
            include './vues/menu_header_footer/greetings.php';
            $input_disabled="";
        }
        else {
            //Affichage de l'interface de connexion
            include './vues/menu_header_footer/connexion.php';
            $input_disabled="disabled";
        }
        break;
}

//Fermeture de la barre de navigation
echo '</div>';
echo '</nav>';
