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
                echo "<div class='panel panel-default'>\r\n";
                echo '<div class="panel-heading">Etudiant id='.$val["id"]."</div>\r\n";
                echo "<div class='panel-body'>\r\n";
                $url="\"modification_etudiant_form_envoi.php\"";
                echo "<form method='get' action=".$url." class='form-group'>\r\n";
                echo "<input type='text' name='id' value=\"".$val["id"]."\" hidden />\r\n";
                echo "<label>Nom : ".$val["family_name"]."</label><br/>\r\n";
                echo "<label>Prénom : ".$val["first_name"]."</label><br/>\r\n";
                echo "<label>Date de naissance : ".$val["birthdate"]."</label><br/>\r\n";
                echo "<label>Nombre de cours : ".$val["number_of_courses"]."</label><br/>\r\n";
                echo "<button type='submit'>Modifier</button>\r\n";
                echo "</form>\r\n";
                echo "</div>\r\n</div>\r\n";
            }?>
    </body>
</html>