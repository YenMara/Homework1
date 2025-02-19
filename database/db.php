<?php
    $host = '127.0.0.1';
    $username = 'root';
    $pass = '';
    $dbname = 'homework1';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try{
        $conn = new PDO($dsn,$username,$pass);
    }catch(Exception $e){
        echo 'Connection failed: '. $e->getMessage();
    }
?>