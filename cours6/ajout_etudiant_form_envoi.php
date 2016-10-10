<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Création d' étudiants</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <h1>Création d'étudiants en DB</h1>
        <form method="post" action="ajout_etudiant_form_reception.php" class="form-group  col-xs-4">
            <label for="t_lname">Nom :</label>
            <input type="text" id="t_lname" name="lname" class="form-control"/>
            <label for="t_fname">Prénom :</label>
            <input type="text" id="t_fname" name="fname" class="form-control" />
            <label for="t_birthdate">Date de naissance :</label>
            <input type="text" id="t_birthdate" name="bdate" class="form-control"/>
            <label for="t_num">Nombre de cours :</label>
            <input type="number" id="t_num" name="nbcses" class="form-control"/>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </body>
</html>
