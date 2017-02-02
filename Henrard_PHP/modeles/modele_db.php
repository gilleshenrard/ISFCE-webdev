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
        $sql.= "FROM ".$table;

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
        $sql.= "FROM ".$table;
        $sql.= " WHERE :id = id ";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":id", $str);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_LAZY);
    }
    
    public function searchBy_FK($table, $fk){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Mauvaise valeur pour la table recherchée!");
        }
        
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ".$table;
        $sql.= " WHERE vehicule_FK LIKE :fk";

        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":fk", $fk);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetchall();
    }
    
    public function update_repa($array){
        $sql = "UPDATE vehicules ";
        $sql.= "SET numero_chassis = :num_ch, plaque = :pl, marque = :ma, modele = :mo, type = :ty ";
        $sql.= "WHERE id LIKE :id";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":num_ch", $array['numero_chassis']);
        $stmt->bindParam(":pl", $array['plaque']);
        $stmt->bindParam(":ma", $array['marque']);
        $stmt->bindParam(":mo", $array['modele']);
        $stmt->bindParam(":ty", $array['type']);
        $stmt->bindParam(":id", $array['id']);
        
        $stmt->execute();
    }
}