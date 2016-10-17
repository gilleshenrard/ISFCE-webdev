<?php
$choix="";
if(isset($_GET["choix"])){
    $choix=$_GET["choix"];
}?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>DvpWeb – cours7</title>
        <link type="text/css" rel="stylesheet" href="vues/css/style_cours7.css" />
    </head>
    <body lang="fr">
        <?php
        include './vues/menu_header_footer/header.php';
        include './vues/menu_header_footer/menu.php';
        
        switch ($choix){
            case "farwest":
            case "":
                include './vues/farwest.php';
                break;
            case "cowboy":
                include './vues/cowboy.php';
                break;
            case "saloon":
                include './vues/saloon.php';
                break;
            case "identification_form":
                break;
            default :
                echo "<h1>Error 404</h1>";
                echo "<h2>Page not found</h2>";
                break;
        }
        
        include './vues/menu_header_footer/footer.php';?>
    </body>
</html>