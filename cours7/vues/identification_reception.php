<?php
if(isset($_POST)){
    var_dump($_POST);
    $titre=$_POST["titre"];
    $login=$_POST["login"];
    $titre += " ";
    $titre += $login;
    echo $titre;
    setcookie("visiteur", $titre);
}