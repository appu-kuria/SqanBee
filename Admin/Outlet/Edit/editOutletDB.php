<?php 
    session_start();

include './../../../Constants/config.php';
$outletName = $_POST['outletName'];
$buildingNo = $_POST['buildingNo'];
$place = $_POST['place'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$outlet_id = $_POST['outlet_id'];
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql =  "UPDATE sb_outlets set outlet_name ='".$outletName."', outlet_location='".$place.
    "', building_no= '".$buildingNo."', city='". $city."', state ='". $state ."', phone = '".$phone."' where outlet_id=".$outlet_id;
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}
?>
<script type="text/javascript">location.href = './../../ProfilePage/profile.php';</script>