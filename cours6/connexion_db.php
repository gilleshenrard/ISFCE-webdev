<?php
function db_connect() {
    static $connection;

    try{
        if(!isset($connection)){
            $dbconfig = parse_ini_file('../dbconfig.ini');
            $connection = new PDO($dbconfig["dsn"], $dbconfig["username"], $dbconfig["password"]);
        }
    }
    catch(PDOException $exception){
        echo "Erreur ! : " .$exception->getMessage() . "<br/>";
        die();
    }
    return $connection;
}
