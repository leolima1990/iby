<?php
    function dbLink(){
        $db_host = 'localhost';
        $db_user = 'admin';
        $db_pass = 'admin';
        $db = 'iby';

        try{
            $db = new PDO("mysql:host=$db_host;dbname=$db",$db_user,$db_pass);
        } catch (Exception $e){
            echo "Unable to access database";
            exit;
        }
        error_reporting(0);
        return $db;
    }