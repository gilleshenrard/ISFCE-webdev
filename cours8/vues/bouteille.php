<?php
    $region=  (isset($_COOKIE["region"])) ? $_COOKIE["region"] : "";
    $vignoble=  (isset($_COOKIE["vignoble"])) ? $_COOKIE["vignoble"] : "";
    $annee=  (isset($_COOKIE["annee"])) ? $_COOKIE["annee"] : "";
?>

<h1>Enregistrer une bouteille</h1>
<img src="images/bouteille.jpg" alt="images/bouteille.jpg" />

<form method="POST" action="index.php?choix=reception_form_bouteille">
    <label for="region">Région :</label><br />
    <input type="text" name="region" id="region" value="<?php echo $region?>" /><br />
    <label for="vignoble">Vignoble :</label><br />
    <input type="text" name="vignoble" id="vignoble" value="<?php echo $vignoble?>" /><br />
    <label for="annee">Année :</label><br />
    <input type="text" name="annee" id="annee" value="<?php echo $annee?>" /><br />
    <label for="id">Numéro d'identification de la bouteille :</label><br />
    <input type="text" name="id" id="id" /><br />
    <input type="submit" value="Enregistrer" />
</form>