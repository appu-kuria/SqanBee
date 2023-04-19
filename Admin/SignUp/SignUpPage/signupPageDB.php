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


//Read Data from DB
// $sql = "SELECT * FROM DJ_CleanKerala;";
// $result = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($result);
// if($resultCheck > 0){
//     echo "There are some result<br>";
//     while($row = mysqli_fetch_assoc($result)){
//         echo " Data : ".$row['LSG_name']."<br><br><br>";
//     };
// }else{
//     echo "No results to display";
// }

//Collecting te variables
$firstName = $_POST['firstName'];
$lasttName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sql_insert = "INSERT INTO SB_Users (firstName, lastName, phonenumber, email) 
VALUES ('$firstName','$lasttName','$phone','$email');";
 mysqli_query($conn,$sql_insert);
 if(mysqli_error($conn)){
    echo "Problem occured in db push";
 }

 $_SESSION['phonenumber'] = $phone;
 $_SESSION['firstName'] = $firstName;
?>
<script type="text/javascript">location.href = './../../ProfilePage/profileDB.php';</script>