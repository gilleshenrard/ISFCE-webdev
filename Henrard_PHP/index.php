<?php
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
        <?php include "./vues/menu_header_footer/menu.php";
        include './controleurs/controleur_header.php';

        try{
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
                    break;
            }
        }
        catch (PDOException $e){
            echo "<h1>ERROR : ".$e->getMessage()."</h1>";
        }
        catch (Exception $e){
            echo "<h1>ERROR : ".$e->getMessage()."</h1>";
        }

        echo "<hr>";

        include './vues/menu_header_footer/footer.php';?>
    </body>

    <?php
        switch ($page) {
            case "vehicule":    //page d'un véhicule spécifique
                echo "<script src='controleurs/scripts/vehicule.js' type='text/javascript'></script>";
                break;

            case "reparation":    //page d'une réparation spécifique
                echo "<script src='controleurs/scripts/reparation.js' type='text/javascript'></script>";
                break;

            default:
                break;
        }?>
</html>
