<?php
if(isset($_POST)){
    include 'connexion_db.php';
    $dbh = db_connection();
    $id = $_POST["id"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $bdate = $_POST["bdate"];
    $nbcses = $_POST["nbcses"];

    $sql = "UPDATE students SET family_name=\"".$lname."\", first_name=\"".$fname."\", birthdate=\"".$bdate."\", number_of_courses=\"".$nbcses."\" WHERE id=".$id;
    $nb_lignes_modifiees = $dbh->exec($sql);
    if ($nb_lignes_modifiees === 1) {
        echo("Réussite de l’INSERT : 1 ligne a été modifiée en DB.");
    } elseif ($nb_lignes_modifiees === 0){
        echo("Requête SQL syntaxiquement correcte MAIS aucune ligne n’a
        été insérée en DB.");
    } elseif ($nb_lignes_modifiees === FALSE) {
        echo("Requête SQL syntaxiquement incorrecte.");
    }
}
