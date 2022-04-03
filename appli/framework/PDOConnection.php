<?php
namespace appli\framework;

class PDOConnection {

    static private?\PDO $oPdo = null;

    static public function get() 
    {
        if (is_null(self::$oPdo)) {
            $oPdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_WEDS_BASE.';charset=utf8', DB_USER, DB_PASSWORD);
            $oPdo -> exec('SET NAMES UTF8');

            self:: $oPdo = $oPdo;
        }

        return self:: $oPdo;
    }

    // static public function checkRegistration()
    // {
    //     if (isset($_POST[$login])) && $_POST[$login] != "") {
    //         return true;
    //     }

    //     return false;
    // }
}