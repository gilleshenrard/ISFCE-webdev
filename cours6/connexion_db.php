<?php
 define('USER', 'DvpWeb');
 define('PASSWORD', 'ISFCE1040');
 define('DSN', 'mysql:host=localhost;dbname=school;charset=UTF8');
 
 try{
     $dbh = new PDO(DSN, USER, PASSWORD);
 }
 catch(PDOException $exception){
 echo "Erreur ! : " .$exception->getMessage() . "<br/>";
 die();
}