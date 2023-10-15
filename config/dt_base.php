<?php
try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "login_db";
    
    $mysqli = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    "Error: " . $e->getMessage();
}