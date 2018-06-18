<?php
/*Класс конфигурации БД*/
class DB
{
    const USER = "troo";
    const PASS = "xtghfg";
    const HOST  = "126.0.0.0";
    const DB =  "local.com";

    public static function connToDB(){

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host;charset=UTF8", $user, $pass);
        return $conn;

    }
}
