<?php

class VehicleController{
    private $_method; //get, post, put.
    private $_complement; //get vehicle 1 o 2.
    private $_data; // datos a insertar o actualizar

    function __construct($method,$complement,$data){
        $this->_method = $method;
        $this->_complement = $complement;
        $this->_data = $data !=0 ? $data : "";
    }

    public function index(){
        switch($this->_method){
            case "GET":
                switch($this->_complement){
                    case 0:
                        $vehicle = VehicleModel::all(0);
                        $json = $vehicle;
                        echo json_encode($json);
                        return;
                    default:
                        $vehicle = VehicleModel::find($this->_complement);
                        if ($vehicle==null)
                            $json = array(
                                "response: "=>"Vehicle not found"
                            );
                        else
                            $json = $vehicle;
                        echo json_encode($json);
                        return;
                }
            case "POST":
                $createvehicle = VehicleModel::create($this->_data);
                $json = array(
                    "response: "=>$createvehicle
                );
                echo json_encode($json,true);
                return;
            case "PUT":
                $createvehicle = VehicleModel::update($this->_complement,$this->_data);
                $json = array(
                    "response: "=>$createvehicle
                );
                echo json_encode($json,true);
                return;
            default:
                $json = array(
                    "ruta: "=>"not found"
                );
                echo json_encode($json,true);
                return;
        }
    }
}
?>