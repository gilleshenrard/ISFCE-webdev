<?php
//Procédure que j'avais mise en place pour un autre projet en Nov 2016
// voir les sources -> https://github.com/gilleshenrard/php_seclog/blob/master/controllers/database.php

class Db{
    private static $connection;

    public function connect(){
        // if no connection exist to the specified database, create a one
        if (!isset(Db::$connection)) {
            Db::$connection = new PDO('dsn = mysql:host=localhost;dbname=garage;charset=UTF8', 'root');
        }
        //return the PDO instance to the database (singleton)
        return Db::$connection;
    }

    public function list_vehicles(){
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM vehicules ";

        $stmt = Db::$connection->prepare($sql);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function select_vehicleID($str){
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM vehicules ";
        $sql.= "WHERE :id = id ";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":id", $str);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetch();
    }
}