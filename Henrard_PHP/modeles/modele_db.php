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
            throw new Exception("Table ".$table." non-trouvée en base de données");
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
    
    public function search_vehicle($str){
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM vehicules";
        $sql.= " WHERE :pl LIKE plaque ";
        $sql.= " OR :num LIKE numero_chassis ";
        $sql.= " OR :ma LIKE marque ";
        $sql.= " OR :mo LIKE modele ";
        $sql.= " OR :ty LIKE type ";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":num", $str);
        $stmt->bindParam(":pl", $str);
        $stmt->bindParam(":ma", $str);
        $stmt->bindParam(":mo", $str);
        $stmt->bindParam(":ty", $str);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetchall();
    }
    
    public function search_user($str){
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM utilisateurs";
        $sql.= " WHERE :login LIKE login";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":login", $str);

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
    
    public function deleteAllBy_FK($fk){
        $sql  = "DELETE FROM reparations";
        $sql .= " WHERE vehicule_FK = :fk";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":fk", $fk);
        $stmt->execute();
    }

    public function update_veh($array){
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
    
    public function update_repa($array){
        $sql = "UPDATE reparations ";
        $sql.= "SET intervention = :int, description = :desc, date = :date ";
        $sql.= "WHERE id LIKE :id";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":int", $array['intervention']);
        $stmt->bindParam(":desc", $array['description']);
        $stmt->bindParam(":date", $array['date']);
        $stmt->bindParam(":id", $array['id']);
        
        $stmt->execute();
    }

    public function add_vehicle($array){
        $sql = "INSERT INTO vehicules (numero_chassis, plaque, marque, modele, type) ";
        $sql.= "VALUES (:num_ch, :pl, :ma, :mo, :ty)";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":num_ch", $array['numero_chassis']);
        $stmt->bindParam(":pl", $array['plaque']);
        $stmt->bindParam(":ma", $array['marque']);
        $stmt->bindParam(":mo", $array['modele']);
        $stmt->bindParam(":ty", $array['type']);
        
        $stmt->execute();
        return Db::$connection->lastInsertId();
    }
        
    public function add_reparation($array){
        $sql = "INSERT INTO reparations (intervention, description, vehicule_FK, date) ";
        $sql.= "VALUES (:int, :des, :fk, :date)";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":int", $array['intervention']);
        $stmt->bindParam(":des", $array['description']);
        $stmt->bindParam(":fk", $array['vehicule_FK']);
        $stmt->bindParam(":date", $array['date']);
        
        $stmt->execute();
        return Db::$connection->lastInsertId();
    }
    
    public function delete($id, $table){
        $sql  = "DELETE FROM ".$table;
        $sql .= " WHERE id = :id";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        
        $stmt->execute();
    }
}