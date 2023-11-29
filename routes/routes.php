<?php

//Detecta nuestra url
$rutasArray = explode("/",$_SERVER['REQUEST_URI']);
$inputs = array(); 
//Raw input for requets
$inputs['raw_input'] = @file_get_contents('php://input');
$_POST = json_decode($inputs['raw_input'], true);
if(count(array_filter($rutasArray))<2){
    $json = array(
        "ruta"=>"not found"
    );
    echo json_encode($json,true);
    return;
}else{
    /**
     * EndPoint Correctos
     *
     */
    $endPoint = (array_filter($rutasArray)[2]);
    $complement= (array_key_exists(3,$rutasArray))? ($rutasArray)[3]:0;
    $add = (array_key_exists(4,$rutasArray))? ($rutasArray)[4]:"";
    if($add !="") $complement .= "/".$add;
    $method = $_SERVER['REQUEST_METHOD'];
    print_r($endPoint);
    switch ($endPoint){
        case 'users':
            if (isset($_POST) && $method == 'POST'){
                $user = new UserController($method, $complement, $_POST);
            }elseif ($method == 'PUT') {
                $user = new UserController($method, $complement, $_POST);
            }else{
                $user = new UserController($method, $complement, 0);
            }
            $user->index();
            break;
        case 'login':
            if(isset($_POST) && $method == 'POST'){
                $user = new LoginController($method, $_POST);
                $user -> index();
            }else{
                $json = array(
                    "ruta"=>"not found"
                );
                echo json_encode($json, true);
                return;
            }
            break;
        case 'type_vehicles':
            switch ($method) {
                case 'GET':
                    $type = new TypeVehicleController($method, $complement, 0);

                break;
                case 'POST':
                    $type = new TypeVehicleController($method, $complement, $_POST);
                break;
                case 'PUT':
                    $type = new TypeVehicleController($method, $complement, $_POST);
                break;
                default:
                    $json = array(
                        "ruta"=>"not found"
                    );
                    echo json_encode($json, true);
                    return;
                break;
            }
            $type->index();
        break;
        default:
            $json = array(
                "ruta"=>"ruta no encontrada"
            );
            echo json_encode($json,true);
            return;
    }
}


?>