<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'mydb');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

function myConnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="mydb";
    date_default_timezone_set("Asia/Manila");

    static $conn;
    $conn = mysqli_connect($servername, $username, $password,$db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        //echo "Connected successfully";	
    }
    return $conn;
}



