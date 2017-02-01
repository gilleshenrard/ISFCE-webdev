<?php
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Gilles Henrard</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    </head>

    <body>
        <?php include "./vues/menu_header_footer/menu.php";?>
        <?php include './vues/menu_header_footer/header.php';?>

        <?php switch ($page) {
            case null:  //Home
            case "list_car":    //liste de voitures
                include './vues/liste_voitures.php';
                break;

            case "vehicle":    //page d'un véhicule spécifique
                include './vues/vehicule.php';
                break;

            case "reparation":    //page d'une réparation spécifique
                include './vues/reparation.php';
                break;

            default:
                break;
        }?>

        <hr>

        <?php include './vues/menu_header_footer/footer.php';?>
    </body>
</html>