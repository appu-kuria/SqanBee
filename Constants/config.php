<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "SQANBEE";

    $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));

?>