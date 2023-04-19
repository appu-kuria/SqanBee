<?php 
    session_start();

include './../../Constants/config.php';

    // $serverName = "localhost";
    // $userName = "root";
    // $password = "";
    // $dbName = "SQANBEE";
echo"about to start connect database operation ";
    $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
    if ($conn->connect_errno) {
        echo("Connect failed: %s\n". $conn->connect_error);
        exit();
    }else{
        echo"<br>No error in connection with db";
    }
?>
<?php

//Collecting the variables
$brand_id = $_POST['brand_id'];
$outletName = $_POST['outletName'];
$buildingNo = $_POST['buildingNo'];
$place = $_POST['place'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$outlet_id = $_POST['outlet_id'];

$sql_update = "UPDATE SB_Outlets set outlet_name ='".$outletName."', outlet_location='".$place."' where outlet_id=".$outlet_id; 
 mysqli_query($conn,$sql_update);
 if(mysqli_error($conn)){
    echo "Problem occured in db push";
 }

?>
<script type="text/javascript">location.href = './../../ProfilePage/profile.php';</script>