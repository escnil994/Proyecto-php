<?php

    class Database{

        public static function connect(){
            $db = new mysqli('localhost', 'escnil994', 'escnil994', 'tienda_master');

            $db->query("SET NAMES 'utf8'");
            return $db;
            
        }
    }