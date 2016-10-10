<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Astronomie</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <?php include './includes/header.php';?>
    <body>
        <?php include './includes/menu.php';?>
        <h1>Table de 5</h1>
        <table>
            <caption>Nombre * 5 = Résultat</caption>
            <?php foreach (range(0, 10) as $i){
                $res = $i*5;
                echo "<tr><td>".$i."</td><td>5</td><td>".$res."</td></tr>";
            }?>
        </table>
    </body>
    <?php include './includes/footer.php';?>
</html>