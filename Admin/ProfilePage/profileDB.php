<?php 
include './../../Constants/config.php';

//     session_start();

//     $serverName = "localhost";
//     $userName = "root";
//     $password = "";
//     $dbName = "SQANBEE";
// echo"about to start connect database operation ";
//     $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
//     if ($conn->connect_errno) {
//         echo("Connect failed: %s\n". $conn->connect_error);
//         exit();
//     }else{
//         echo"<br>No error in connection with db";
//     }
//Read Data from DB
$sql = "SELECT * FROM SB_Users WHERE user_id = $_SESSION[user_id];";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    echo "There are some result<br>";
    while($row = mysqli_fetch_assoc($result)){
        // $_SESSION['user_id']=$row['user_id'];
    };
}else{
    echo "No results to display";
}
?>
<script type="text/javascript">location.href = './profile.php';</script>