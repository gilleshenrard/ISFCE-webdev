<?php

session_start();

$choix="default";
if (isset($_GET["choix"])) {
        $choix=$_GET["choix"];
}
    
if(isset($_POST["region"])){
    setcookie('region', $_POST["region"], time()+60*60*24*10);
}
if(isset($_POST["vignoble"])){
    setcookie('vignoble', $_POST["vignoble"], time()+60*60*24*10);
}
if(isset($_POST["annee"])){
    setcookie('annee', $_POST["annee"], time()+60*60*24*10);
}
if($_POST["choix"]=="deco"){
   
}
else{
    if (isset($_POST["login"])) {
        $_SESSION["login"]=$_POST["login"];
    }

    if (isset($_POST["password"])) {
        $_SESSION["password"]=$_POST["password"];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>DvpWeb -cours 8</title>
        <link rel="stylesheet" type="text/css" href="css/style_cours8.css" />
    </head>
    <body>
        <?php include './menu_header_footer/header.php';
        include './menu_header_footer/menu.php';

        switch ($choix) {
            case "default":
            case "vin":
                include './vin.php';
                break;
            
            case "régions":
                include './regions.php';
                break;
            
            case "bouteille":
                include './bouteille.php';
                break;
            
            case "reception_form_bouteille":
                include './reception_form_bouteille.php';
                break;

            default:
                echo "<h1>Page non-trouvée</h1>";
                break;
        }
        
        include './menu_header_footer/footer.php';?>
    </body>
</html>