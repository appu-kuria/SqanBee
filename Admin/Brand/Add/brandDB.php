<?php
session_start();
include './../../../Constants/config.php';

//Collecting te variables
$brandName = $_POST['brandName'];
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO SB_Brands (user_id, brand_name) 
    VALUES ('$_SESSION[user_id]','$brandName');";
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}

?>
<script type="text/javascript">location.href = './../../Outlet/Add/outlet.php';</script>