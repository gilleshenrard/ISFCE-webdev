<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        // EXERCICE 1

        $cours = [
            "Système d’exploitation",
            "Projet de développement Web",
            "Initiation aux bases de données",
            "Structure des ordinateurs",
            "Elements de statistiques"
        ];

        $cours[] = "Mathématiques pour l'informatique"; // ajoute le 6è cours

        var_dump($cours);

        $points = array(
            74,
            70,
            80,
            55,
            65
        );

        $points[] = 67;

        var_dump($points);

        for ($i = 0; $i < count($cours); $i++) {
            echo ("<h1>" . $cours[$i] . "</h1> \r\n");
            echo ("<p> Points obtenus : " . $points[$i] . " % </p> \r\n");
        }

        echo("<p> Liste des cours : ");
        foreach ($cours as $un_cours) {
            echo($un_cours . " ;");
        }

        $total_points = 0;
        for ($i = 0; $i < count($points); $i++) {
            $total_points = $total_points + $points[$i];
        }
        $moyenne = $total_points / count($points);
        echo("<h1> Résumé des cours </h1> \r\n");
        echo("<p> Il y a " . count($cours) . "cours différents, la moyenne des points est de "
        . $moyenne . "% </p> \r\n");
        ?>

    </body>
</html>
