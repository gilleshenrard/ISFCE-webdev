<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Astronomie</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <?php include './includes/header.php';?>
    <body>
        <?php include './includes/menu.php';?>
        <h1>Nombres de 100 à 80 - boucle for</h1>
        <ul>
            <?php for($num=100; $num>=80; $num--){
                echo"<li>".$num."</li>";
            }?>
        </ul>
        
        <h1>Multiplier un nombre par 2 tant que < 1024 - boucle while</h1>
        <p>
            <?php $num=1;
            while($num<1024){
                echo $num." --->";
                $num *=2;
            }
            echo "Fin";?>
        </p>
    </body>
    <?php include './includes/footer.php';?>
</html>