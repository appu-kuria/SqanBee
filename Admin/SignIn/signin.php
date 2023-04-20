<?php
session_start();
include './../../Constants/config.php';
    $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
    if ($conn->connect_errno) {
        echo("Connect failed: %s\n". $conn->connect_error);
        exit();
    }else{
        echo"<br>No error in connection with db";
        echo"<br>username'".$_POST['username']."' type : ".gettype($_POST['username']);
        echo"<br>password'".$_POST['password']."' type : ".gettype($_POST['password']);
        $pass = $_POST['password'];
    }
        // Read Data from DB
        $sql = "SELECT * FROM SB_Users WHERE phonenumber = $_POST[username] AND password = '$pass' ;";
        $result = mysqli_query($conn, $sql);
        echo "asd";
        $resultCheck = mysqli_num_rows($result);
        echo "<br>number of rows : ".$resultCheck."<br>";
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "user id is ".$row['user_id'];
                $_SESSION['user_id'] = $row['user_id'];
                echo "<br>session value is ".$_SESSION['user_id'];
            if($_SESSION){
                echo "<script type='text/javascript'>location.href = './../ProfilePage/profile.php';</script>";        
            }
        
            };
         
             exit();
        }else{
            echo "No results to display";
        }
    ?>