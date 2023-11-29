<?php

require_once("config.php");

class Connection{
    private static $connection = null;

    public function __construct(){}

    static public function connection(){
            try {
                $data = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
                self::$connection = new PDO($data, DB_USERNAME, DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $message = array(
                    "msg" => ($e)
                );
                echo ($e->getMessage());
            }
        return self::$connection;
    }
}
?>
