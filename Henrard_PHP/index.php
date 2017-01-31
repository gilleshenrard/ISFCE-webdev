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
        <?php include "./vues/menu_header_footer/menu.php";?>
        <?php include './vues/menu_header_footer/header.php';?>

        <div class="container">
            <div class="row">
                <?php switch ($page) {
                    case null:  //Home
                        break;
                    
                    case "list_car":    //
                        include './vues/liste_voitures.php';
                        break;
                    
                    case "list_fix":
                        //include './vues/liste_voitures.php';
                        break;

                    default:
                        break;
                }?>
            </div>
        </div>

        <hr>

        <?php include './vues/menu_header_footer/footer.php';?>
    </body>
</html>