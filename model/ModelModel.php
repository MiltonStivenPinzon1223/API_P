<?php

require_once "ConDB.php";

class ModeleModel {

    public static function all(){
        $query = "SELECT * FROM models";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $models = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $models;
    }

    public static function find($id){
        $query = "SELECT * FROM models WHERE tyve_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $model = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $model;
    }

    public static function create($data){
        $query = "INSERT INTO `models`( `tyve_model`) VALUES ('".$data['tyve_model']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("model created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `models` SET `tyve_model`='".$data['tyve_model']."' WHERE tyve_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("model updated successfully");
        return $message;
    }
}
?>