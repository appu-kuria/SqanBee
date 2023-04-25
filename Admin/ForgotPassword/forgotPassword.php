<?php
session_start();
include './../../Constants/config.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    if(empty($_POST['username']) && empty($_POST['password'])){
        header('Location:signinPage.php?error=Username and password are required');
    }
    else if(empty($_POST['username'])){
        header('Location:signinPage.php?error=Username is required');
    }
    else if(empty($_POST['password'])){
        header('Location:signinPage.php?error=Password is required');
    }
    $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
    if ($conn->connect_errno) {
        echo("Connect failed: %s\n". $conn->connect_error);
        exit();
    }else{
        $pass = $_POST['password'];
    }
        // Read Data from DB
        $sql = "SELECT * FROM SB_Users WHERE phonenumber = $_POST[username] AND password = '$pass' ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['user_id'] = $row['user_id'];
                if($_SESSION){
                    echo "<script type='text/javascript'>location.href = './../ProfilePage/profile.php';</script>";        
                    exit();
                }else{
                    header("Location : signinPage.php?error=Invalid username or password");   
                    exit();           
                }
            };
        }else{
            header("Location : signinPage.php?error=Invalid username or password");      
            exit();
        }
    ?>