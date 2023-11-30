<?php

require_once "ConDB.php";

class ModelModel {

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
        $query = "INSERT INTO `models`(`mod_model`, `tyve_id`) VALUES ('".$data['mod_model']."', '".$data['tyve_id']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("model created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `models` SET `mod_model`='".$data['mod_model']."',`tyve_id`='".$data['tyve_id']."' WHERE mod_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("model updated successfully");
        return $message;
    }
}
?>