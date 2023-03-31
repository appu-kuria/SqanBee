<?php 
    session_start();

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "SQANBEE";
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
// //Read Data from DB
// $sql = "SELECT * FROM SB_Users WHERE phonenumber = $_SESSION[phonenumber];";
// $result = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($result);
// if($resultCheck > 0){
//     echo "There are some result<br>";
//     while($row = mysqli_fetch_assoc($result)){
//         $user_id = $row['user_id'];
//         $_SESSION['user_id'] = $user_id;
//     };
// }else{
//     echo "No results to display";
// }



//Collecting the variables
$brand_id = $_POST['brand_id'];
$outletName = $_POST['outletName'];
$buildingNo = $_POST['buildingNo'];
$place = $_POST['place'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone = $_POST['phone'];

$sql_insert = "INSERT INTO SB_Outlets (brand_id, outlet_name, outlet_location, is_active) 
VALUES ('$brand_id','$outletName','$place','1');";
 mysqli_query($conn,$sql_insert);
 if(mysqli_error($conn)){
    echo "Problem occured in db push";
 }

?>
<script type="text/javascript">location.href = './../../Menu/menu.php';</script>