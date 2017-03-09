<?php
//Procédure que j'avais mise en place pour un autre projet en Nov 2016
// voir les sources -> https://github.com/gilleshenrard/php_seclog/blob/master/controllers/database.php

class Db{
    private static $connection;

    /**
     * Lance une connexion à la DB si aucune n'est en cours
     * @return type
     */
    public function connect(){
        // if no connection exist to the specified database, create a one
        if (!isset(Db::$connection)) {
            Db::$connection = new PDO('mysql:host=localhost;dbname=garage;charset=UTF8', 'root');
        }
        //return the PDO instance to the database (singleton)
        return Db::$connection;
    }

    /**
     * Liste les lignes d'une table
     * @param type $table
     * @return type
     * @throws Exception
     */
    public function list_table($table){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$table." non-trouvée");
        }
        
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ".$table;

        $stmt = Db::$connection->prepare($sql);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetchall();
    }
    
    /**
     * Recherche un ID dans la table renseignée
     * @param type $table
     * @param type $str
     * @return type
     * @throws Exception
     */
    public function searchBy_ID($table, $str){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$table." non-trouvée");
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
    
    /**
     * Recherche la valeur fournie dans toutes les valeurs possibles de la table
     * @param type $str
     * @param type $table
     * @return type
     * @throws Exception
     */
    public function searchBy_All($str, $table){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$table." non-trouvée");
        }

        //Récupération de tous les noms de colonne de la table
        $stmt = Db::$connection->prepare("DESCRIBE ".$table);
        $stmt->execute();
        $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);

        //Préparation de la query string
        $sql = "SELECT * FROM ".$table." WHERE ";
        foreach ($columns as $value) {
            $sql.= ":".$value." LIKE ".$value." OR ";
        }
        $sql = rtrim($sql," OR ");
        
        //Préparation de la query elle-même
        $stmt2 = Db::$connection->prepare($sql);
        foreach ($columns as $key) {
            $stmt2->bindParam(":".$key, $str);
        }

        //Exécution et renvoi des résultats
        $stmt2->execute();
        return $stmt2->fetchall();
    }
    
    /**
     * Cherche la valeur fournie en tant que paramètre dans la table
     * @param type $str
     * @param type $param
     * @param type $table
     * @param type $searchall
     * @return type
     * @throws Exception
     */
    public function searchBy_Param($str, $param, $table, $searchall=NULL){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$table." non-trouvée");
        }
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ".$table;
        $sql.= " WHERE :param LIKE ".$param;

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":param", $str);

        // execution et retour des résultats
        $stmt->execute();
        if($searchall != TRUE){
            return $stmt->fetch(PDO::FETCH_LAZY);
        }
        else{
            return $stmt->fetchall();
        }
    }
    
    /**
     * Supprime toutes les lignes dont le paramètre correspondent à la valeur envoyée
     * @param type $str
     * @param type $param
     * @param type $table
     * @throws Exception
     */
    public function deleteBy_Param($str, $param, $table){
        if (!in_array($table, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$table." non-trouvée");
        }
        $sql  = "DELETE FROM ".$table;
        $sql .= " WHERE ".$param." = :param";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":param", $str);
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