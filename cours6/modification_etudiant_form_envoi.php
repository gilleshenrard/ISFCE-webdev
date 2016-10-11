<?php include './connexion_db.php';
$sql = "SELECT * FROM students WHERE id = ".$_GET["id"].";";
$sth = $dbh->query($sql);
$stud = $sth->fetch(PDO::FETCH_BOTH);
?>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Modification d'un étudiant</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <h1>Modification d'un étudiant</h1>
        <form method="post" action="modification_etudiant_form_reception.php" class="form-group  col-xs-4">
            <?php 
                echo "<label for='t_lname'>Nom :</label>\r\n";
                echo "<input type='text' id='t_lname' name='lname' class='form-control' value='".$stud["family_name"]."'/>\r\n";
                echo "<label for='t_fname'>Prénom :</label>\r\n";
                echo "<input type='text' id='t_fname' name='fname' class='form-control' value='".$stud["first_name"]."'/>\r\n";
                echo "<label for='t_bdate'>Date de naissance :</label>\r\n";
                echo "<input type='text' id='t_bdate' name='bdate' class='form-control' value='".$stud["birthdate"]."'/>\r\n";
                echo "<label for='t_nbcses'>Nombre de cours :</label>\r\n";
                echo "<input type='text' id='t_nbcses' name='nbcses' class='form-control' value='".$stud["number_of_courses"]."'/>\r\n";
                echo "<input type='text' hidden name='id' value='".$stud["id"]."' />";
                echo "<button type='submit' class='btn btn-primary'>Valider</button>\r\n";
            ?>
        </form>
    </body>
</html>
