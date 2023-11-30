<?php

require_once "controller/UserController.php";
require_once "controller/TypeVehicleController.php";
require_once "controller/ModelController.php";
require_once "controller/VehicleController.php";
require_once "controller/RegistrationController.php";
require_once "controller/routesController.php";
require_once "controller/LoginController.php";
require_once "model/UserModel.php";
require_once "model/TypeVehicleModel.php";
require_once "model/ModelModel.php";
require_once "model/VehicleModel.php";
require_once "model/RegistrationModel.php";

header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Authorization');
//$rutasArray = $_SERVER['REQUEST_URI'];

$rutasArray = explode("/", $_SERVER['REQUEST_URI']);
$endPoint = (array_filter($rutasArray)[2]); // colocar un if

    $routes = new RoutesController();
    $routes->index();    
//}
?>