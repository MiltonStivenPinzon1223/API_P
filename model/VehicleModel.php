<?php

require_once "ConDB.php";

class VehicleModel {

    public static function all(){
        $query = "SELECT vehicles.*, models.mod_model, users.use_name FROM vehicles INNER JOIN models ON vehicles.mod_id = models.mod_id INNER JOIN users ON vehicles.use_id = users.use_id;";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $vehicles;
    }

    public static function find($id){
        $query = "SELECT vehicles.*, models.mod_model, users.use_name FROM vehicles INNER JOIN models ON vehicles.mod_id = models.mod_id INNER JOIN users ON vehicles.use_id = users.use_id WHERE veh_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $vehicle = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $vehicle;
    }

    public static function create($data){
        $query = "INSERT INTO `vehicles`(`veh_plate`, `mod_id`, `use_id`) VALUES ('".$data['veh_plate']."','".$data['mod_id']."','".$data['use_id']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("vehicle created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `vehicles` SET `veh_plate`='".$data['veh_plate']."',`mod_id`='".$data['mod_id']."',`use_id`='".$data['use_id']."' WHERE veh_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("vehicle updated successfully");
        return $message;
    }
}
?>