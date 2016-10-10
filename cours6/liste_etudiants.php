<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Liste des étudiants</title>
    </head>
    <body>
        <h1>Liste des étudiants en DB</h1>
        <?php include 'connexion_db.php';
            $sql = "SELECT * FROM students";
            $sth = $dbh->query($sql);
            $students = $sth->fetchAll(PDO::FETCH_ASSOC);

            foreach($students as $val){
                echo "<h2>Etudiant id=".$val["id"]."</h2>";
                echo "<ul>";
                echo "<li>Nom : ".$val["family_name"]."</li>";
                echo "<li>Prénom : ".$val["first_name"]."</li>";
                echo "<li>Date de naissance : ".$val["birthdate"]."</li>";
                echo "<li>Nombre de cours : ".$val["number_of_courses"]."</li>";
                echo "</ul>";
            }?>
    </body>
</html>