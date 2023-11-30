<?php

require_once "ConDB.php";

class RegistrationModel {

    public static function all(){
        $query = "SELECT registrations.*, vehicles.veh_plate, (SELECT users.use_name FROM vehicles INNER JOIN users ON vehicles.use_id = users.use_id) as use_name, type_registration.tyre_type FROM `registrations` INNER JOIN type_registration ON registrations.tyre_id = type_registration.tyre_id INNER JOIN vehicles ON registrations.veh_id = vehicles.veh_id;";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $registrations = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $registrations;
    }

    public static function find($id){
        $query = "SELECT registrations.*, vehicles.veh_plate, (SELECT users.use_name FROM vehicles INNER JOIN users ON vehicles.use_id = users.use_id) as use_name, type_registration.tyre_type FROM `registrations` INNER JOIN type_registration ON registrations.tyre_id = type_registration.tyre_id INNER JOIN vehicles ON registrations.veh_id = vehicles.veh_id WHERE reg_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $registration = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $registration;
    }

    public static function create($data){
        $date = date("Y-m-d");
        $query = "INSERT INTO `registrations`(`reg_date`, `veh_id`, `tyre_id`) VALUES ('".$date."','".$data['veh_id']."','".$data['tyre_id']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("registration created successfully");
        return $message;
    }

}
?>