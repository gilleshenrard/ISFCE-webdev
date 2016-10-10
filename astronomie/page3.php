<?php
    $planets = ["mercure", "venus", "terre", "mars", "jupiter", "saturne", "uranus", "neptune"];
    $scientists = ["Copernic" => "Copernic fit ses études à Cracovie, ...",
                    "Kepler" => "Véritable créateur de l'astronomie, ..."];
?>

<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Astronomie</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <?php include './includes/header.php';?>
    <body>
        <?php include './includes/menu.php';?>

        <h1>Les planètes - boucle for</h1>
        <ol type="1">
            <?php for($i=0; $i<count($planets) ; $i++){
                echo "<li>".$planets[$i]."</li>";
            }?>
        </ol>
        
        <h1>Les planètes boucle foreach sur les clefs</h1>
        <ul type="*">
            <?php foreach ($planets as $value) {
                echo "<li>".$value."</li>";
            }?>
        </ul>

        <h1>Les astronomes - boucle foreach sur les clefs et les valeurs</h1>
        <?php $scientists["Einstein"]="Il avait une moustache qui claquait sa race...";?>
        <dl>
            <?php foreach ($scientists as $key => $value) {
                echo"<dt>".$key."</dt>";
                echo "<dd>".$value."</dd>";
            }?>
        </dl>
    </body>
    <?php include './includes/footer.php';?>
</html>