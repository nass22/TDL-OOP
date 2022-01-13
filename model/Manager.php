<?php

class Manager{
    protected function dbConnect(){
        $servname = 'localhost';
        $dbname = 'todolist';
        $user = 'root';
        $password = 'root';
    
    
        $db = new PDO(
            "mysql:host=$servname;dbname=$dbname;charset=utf8",
            $user,
            $password
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
        echo "Connected to db!";
    }
}