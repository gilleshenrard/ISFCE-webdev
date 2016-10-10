<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Transports</title>
    </head>
    <body>
        <dl>
        <?php
            $transports=["TaxiTEC " => "A l’occasion des Fêtes de Wallonie, la SNCB renforcera la capacité de certains
            trains. En outre, un train spécial de Namur vers Charleroi est prévu les samedi 17 et
            dimanche 18 septembre tôt le matin.",
                        "Trains" => "Les taxis stationnent place de la Station (face à la gare) et avenue Golenvaux (côté
            opposé à la Maison de la Culture)."];

            foreach ($transports as $transp => $descr) {
                echo "<dt>".$transp."</dt><dd>".$descr."</dd>";
            }
        ?>
        </dl>
    </body>
</html>