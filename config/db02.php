<?php

class Database2{

    public static function connect(){
        $db = new mysqli('localhost', 'root', '1234', 'el_salvador');

        $db->query("SET NAMES 'utf8'");
        return $db;

    }
}