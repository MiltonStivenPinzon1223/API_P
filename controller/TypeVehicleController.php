<?php

class TypeVehicleController{
    private $_method; //get, post, put.
    private $_complement; //get type 1 o 2.
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
                        $type = TypeVehicleModel::all(0);
                        $json = $type;
                        echo json_encode($json);
                        return;
                    default:
                        $type = TypeVehicleModel::find($this->_complement);
                        if ($type==null)
                            $json = array(
                                "response: "=>"type not found"
                            );
                        else
                            $json = $type;
                        echo json_encode($json);
                        return;
                }
            case "POST":
                $createtype = TypeVehicleModel::create($this->_data);
                $json = array(
                    "response: "=>$createtype
                );
                echo json_encode($json,true);
                return;
            case "PUT":
                $createtype = TypeVehicleModel::update($this->_complement,$this->_data);
                $json = array(
                    "response: "=>$createtype
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