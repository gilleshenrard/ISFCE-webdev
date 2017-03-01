<?php
session_start();

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

//Connexion à la DB
include_once './modeles/modele_db.php';
$database = new Db();
$database->connect();
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Gilles Henrard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        try{
            include "./controleurs/controleur_menu.php";
            include './vues/menu_header_footer/header.php';

            switch ($page) {
                case null:  //Home
                case "list":    //liste de voitures
                    include './controleurs/controleur_liste.php';
                    break;

                case "vehicule":    //page d'un véhicule spécifique
                    include './controleurs/controleur_vehicule.php';
                    break;

                case "reparation":    //page d'une réparation spécifique
                    include './controleurs/controleur_reparation.php';
                    break;

                default:
                    throw new Exception('Page inconnue');
                    break;
            }
        }
        catch (PDOException $e){
            include './vues/erreur.php';
        }
        catch (Exception $e){
            include './vues/erreur.php';
        }

        echo "<hr>";

        include './vues/menu_header_footer/footer.php';?>
    </body>
</html>
