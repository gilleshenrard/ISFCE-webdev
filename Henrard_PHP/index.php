<?php
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Gilles Henrard</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    </head>

    <body>
        <?php include "./vues/menu_header_footer/menu.php";
        include './vues/menu_header_footer/header.php';

        switch ($page) {
            case null:  //Home
            case "list_car":    //liste de voitures
                include './controleurs/controleur_vehicules.php';
                break;

            case "vehicle":    //page d'un véhicule spécifique
                include './controleurs/controleur_vehicule.php';
                break;

            case "reparation":    //page d'une réparation spécifique
                include './controleurs/controleur_reparation.php';
                break;

            default:
                break;
        }

        echo "<hr>";

        include './vues/menu_header_footer/footer.php';?>
    </body>
</html>