<?php
session_start();

include './../../Constants/config.php';
echo "about to start connect database operation ";
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {
    echo "<br>No error in connection with db";
}
?>
<?php

// echo $_SERVER['REQUEST_URI'];
$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);
$qr= $query['qr'];
$_SESSION["scanned_qr"] = $qr;
// echo $qr;
$sql = "SELECT * FROM SB_QRCodes WHERE qr ='".$qr."'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)) 
    {        
    $outletId= $row['outlet_id'];
    // echo $outletId;
    header('Location: ./../MenuPage/menuSample.php?outlet_id='.$outletId);
    }
}
else{
    header('Location: ./../../Admin/SignIn/signinPage.php');
}

?>
