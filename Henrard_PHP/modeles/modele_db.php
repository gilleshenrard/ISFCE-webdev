<?php
//Procédure que j'avais mise en place pour un autre projet en Nov 2016
// voir les sources -> https://github.com/gilleshenrard/php_seclog/blob/master/controllers/database.php

class Db{
    private static $connection;

    public function connect(){
        // if no connection exist to the specified database, create a one
        if (!isset(Db::$connection)) {
            Db::$connection = new PDO('mysql:host=localhost;dbname=garage;charset=UTF8', 'root');
        }
        //return the PDO instance to the database (singleton)
        return Db::$connection;
    }

    public function list_table($table){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Mauvaise valeur pour la table recherchée!");
        }
        
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ";
        $sql.= $table;

        $stmt = Db::$connection->prepare($sql);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetchall();
    }
    
    public function searchBy_ID($table, $str){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Mauvaise valeur pour la table recherchée!");
        }
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ";
        $sql.= $table;
        $sql.= " WHERE :id = id ";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":id", $str);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_LAZY);
    }
}