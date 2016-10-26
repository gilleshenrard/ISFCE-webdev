<?php
 $dbconfig = parse_ini_file('../dbconfig.ini');
 
 try{
     $dbh = new PDO($dbconfig["dsn"], $dbconfig["username"], $dbconfig["password"]);
 }
 catch(PDOException $exception){
 echo "Erreur ! : " .$exception->getMessage() . "<br/>";
 die();
}
