<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "SQANBEE";
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {
    // echo "<br>No error in connection with db";
}

$brand_id=!empty($_POST['brand_id'])?$_POST['brand_id']:'';
if(!empty($brand_id))
  {
   
   $sql = "SELECT * FROM SB_Outlets WHERE brand_id = '$brand_id'";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value=".$row['outlet_id'].">".$row['outlet_location']."</option>";
                                    };
                                }
                                else{
                                    echo "No data";
                                }
 }
 ?>