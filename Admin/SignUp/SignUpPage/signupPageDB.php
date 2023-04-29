<?php
session_start();
include './../../../Constants/config.php';
//Collecting te variables
$firstName = $_POST['firstName'];
$lasttName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$passwords = $_POST['password'];
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO sb_users (firstName, lastName, phonenumber,password, email)
    VALUES ('$firstName','$lasttName','$phone','$passwords','$email')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}
?>
<script type="text/javascript">location.href = './../../SignIn/signinPage.php';</script>