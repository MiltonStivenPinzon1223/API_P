<?php

require_once "ConDB.php";

class TypeVehicleModel {

    public static function all(){
        $query = "SELECT * FROM type_vehicles";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $types;
    }

    public static function find($id){
        $query = "SELECT * FROM type_vehicles WHERE tyve_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $type = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $type;
    }

    public static function create($data){
        $query = "INSERT INTO `type_vehicles`( `tyve_type`) VALUES ('".$data['tyve_type']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("type created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `type_vehicles` SET `tyve_type`='".$data['tyve_type']."' WHERE tyve_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("type updated successfully");
        return $message;
    }
}
?>