<?php
session_start();
include './../../../Constants/config.php';

$brand_id = $_POST['brand_id'];
$outletName = $_POST['outletName'];
$buildingNo = $_POST['buildingNo'];
$place = $_POST['place'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO sb_outlets (brand_id, outlet_name, outlet_location, is_active, building_no, city, state, phone) 
    VALUES ('$brand_id','$outletName','$place','1', '$buildingNo', '$city', '$state', '$phone');";
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}


?>
<script type="text/javascript">location.href = './../../Menu/menu.php';</script>