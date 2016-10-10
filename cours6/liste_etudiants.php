<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Liste des étudiants</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <h1>Liste des étudiants en DB</h1>
        <?php include 'connexion_db.php';
            $sql = "SELECT * FROM students";
            $sth = $dbh->query($sql);
            $students = $sth->fetchAll(PDO::FETCH_ASSOC);

            foreach($students as $val){
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">Etudiant id='.$val["id"]."</div>\r\n";
                echo '<div class="panel-body">';
                $url="\"modification_etudiant_form_envoi.php?id=".$val["id"]."\"\r\n";
                echo '<form method="get" class="form-group" action='.$url.">";
                //echo "<input type='text' name='id' hidden>".$val["id"]."</label>";
                echo "<label>Nom : ".$val["family_name"]."</label><br/>\r\n";
                echo "<label>Prénom : ".$val["first_name"]."</label><br/>\r\n";
                echo "<label>Date de naissance : ".$val["birthdate"]."</label><br/>\r\n";
                echo "<label>Nombre de cours : ".$val["number_of_courses"]."</label><br/>\r\n";
                echo '<button type="submit">Modifier</button>';
                echo "</div>\r\n";
                echo "</form>\r\n";
            }?>
    </body>
</html>