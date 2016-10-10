<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Création d' étudiants</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>Création d'étudiants en DB</h1>
        <form method="post" action="ajout_etudiant_form_reception.php">
            <label for="t_lname">Nom :</label>
            <input type="text" id="t_lname" name="lname"/>
            <label for="t_fname">Prénom :</label>
            <input type="text" id="t_fname" name="fname"/>
            <label for="t_birthdate">Date de naissance :</label>
            <input type="text" id="t_birthdate" name="bdate"/>
            <label for="t_num">Nombre de cours :</label>
            <input type="number" id="t_num" name="nbcses"/>
            <input type="submit" value="Valider" />
        </form>
    </body>
</html>
