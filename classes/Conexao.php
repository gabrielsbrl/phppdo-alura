<?php

require_once __DIR__ . "/config.php";

class Conexao {

    public static function getConnection() {
        $conn = new PDO(DB_DRIVE.':host='.DB_HOSTNAME.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

}