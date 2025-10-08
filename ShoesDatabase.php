<?php
function getDB()
{
    $db_host = "localhost";
    $db_name = "shoe_inventory";
    $db_user = "ShoeUser";
    $db_pass = "password";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    return $conn;
}


class Database
{

    public function getConn()
    {
        $db_host = "localhost";
        $db_name = "shoe_inventory";
        $db_user = "ShoeUser";
        $db_pass = "password";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';

        try {

            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
