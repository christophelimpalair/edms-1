<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=edms", $username, $password);
    //echo "Database Connected successfully";
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?> 