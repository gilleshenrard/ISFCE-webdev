<?php
//Procédure que j'avais mise en place pour un autre projet en Nov 2016
// voir les sources -> https://github.com/gilleshenrard/php_seclog/blob/master/controllers/database.php

class Db{
    private static $connection;
    private $table;
    
    /**
     * Construit un nouvel objet Db et initialise le nom de la table
     */
    function __construct($table=NULL) {
        if (isset($table)) {
            $this->set_table($table);
        }
        else{
            $this->table = NULL;
        }
    }

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
     * Vérifie si la table envoyée est correcte et assigne sa valeur si oui
     * @param type $str
     * @throws Exception
     */
    public function set_table($str){
        if (!in_array($str, array("vehicules", "reparations", "utilisateurs"))) {
            throw new Exception("Table ".$str." non-trouvée");
        }
        
        $this->table = $str;
    }
    
    /**
     * Retourne le nom de la table utilisée
     * @return type
     */
    public function get_table(){
        return $this->table;
    }

    /**
     * Vérifie si la table et la colonne envoyés existent
     * @param type $table
     * @param type $param
     * @return boolean
     * @throws Exception
     */
    private function get_tablecolumns(){
        //Récupération de tous les noms de colonne de la table
        $stmt = Db::$connection->prepare("DESCRIBE ". $this->get_table());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Liste les lignes d'une table
     * @return type
     * @throws Exception
     */
    public function list_table(){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        
        // query à exécuter
        $sql = "SELECT * FROM ". $this->get_table();
        $stmt = Db::$connection->prepare($sql);

        // execution et retour des résultats
        $stmt->execute();
        return $stmt->fetchall();
    }
    
    /**
     * Recherche une ligne de la table via la colonne envoyée
     * @param type $value
     * @param type $key
     * @param type $fetchall
     * @return type
     * @throws Exception
     */
    public function search($value, $key, $fetchall=NULL){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        if (!in_array($key, $this->get_tablecolumns())) {
            throw new Exception($key." n'est pas une colonne de la table ".$this->get_table());
        }
        
        // query à exécuter
        $sql = "SELECT * ";
        $sql.= "FROM ".$this->get_table();
        $sql.= " WHERE ".$key." LIKE :value";

        // preparation de la query (sécurisée)
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":value", $value);

        // execution et retour des résultats
        $stmt->execute();
        if($fetchall == TRUE){
            return $stmt->fetchall();
        }
        else{
            return $stmt->fetch(PDO::FETCH_LAZY);
        }
    }
    
    /**
     * Recherche la valeur fournie dans toutes les valeurs possibles de la table
     * @param type $str
     * @return type
     * @throws Exception
     */
    public function searchAll($str){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        $columns = $this->get_tablecolumns();

        //Préparation de la query string
        //      -> recherche de $str dans toutes les colonnes
        $sql = "SELECT * FROM ".$this->get_table()." WHERE ";
        foreach ($columns as $col) {
            $sql.= ":".$col." LIKE ".$col." OR ";
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
     * Supprime toutes les lignes dont le paramètre corresponde à la valeur envoyée
     * @param type $str
     * @param type $param
     * @throws Exception
     */
    public function delete($value, $key){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        if (!in_array($key, $this->get_tablecolumns())) {
            throw new Exception($key." n'est pas une colonne de la table ".$this->get_table());
        }
        
        $sql  = "DELETE FROM ".$this->get_table();
        $sql .= " WHERE ".$key." = :value";
        
        $stmt = Db::$connection->prepare($sql);
        $stmt->bindParam(":value", $value);
        $stmt->execute();
    }

    /**
     * Update une ligne de la table avec les données reçues
     * @param type $array
     * @throws Exception
     */
    public function update($array){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        $columns = $this->get_tablecolumns();
        
        //Préparation de la string query sql
        //      UPDATE table SET key1 = value1, key2 = value2 WHERE id LIKE valueid
        $sql = "UPDATE ".$this->get_table()." SET ";
        foreach ($columns as $col) {
            if ($col != 'id') {   
                $sql.= $col." = :".$col.", ";
            }
        }
        $sql = rtrim($sql,", ");
        $sql.= " WHERE id LIKE :id";
        
        //Préparation de la query elle-même
        $stmt = Db::$connection->prepare($sql);
        foreach ($columns as $col) {
            $stmt->bindParam(":".$col, $array[$col]);
        }
        
        //Exécution
        $stmt->execute();
    }

    /**
     * Ajoute une ligne dans la table sélectionnée
     * @param type $array
     * @return type
     * @throws Exception
     */
    public function add($array){
        if ($this->get_table()==NULL) {
            throw new Exception("Aucune table sélectionnée");
        }
        $columns = $this->get_tablecolumns();

        //Préparation de la string query
        //      INSERT INTO table (key1, key2) VALUES (value1, value2)
        $sql = "INSERT INTO ".$this->get_table()." (";
        foreach ($columns as $col) {
            if ($col != 'id') {
                $sql.= $col.", ";
            }
        }
        $sql = rtrim($sql,", ");
        $sql.= ") VALUES (";
        foreach ($columns as $col) {
            if ($col != 'id') {
                $sql.= ":".$col.", ";
            }
        }
        $sql = rtrim($sql,", ");
        $sql.=")";
        
        var_dump($sql);
        
        //Préparation de la query elle-même
        $stmt = Db::$connection->prepare($sql);
        foreach ($columns as $col) {
            if ($col != 'id') {
                $stmt->bindParam(":".$col, $array[$col]);
            }
        }
        
        //Exécution et retour de l'ID de la ligne créée
        $stmt->execute();
        return Db::$connection->lastInsertId();
    }
}