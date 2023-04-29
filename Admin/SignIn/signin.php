<?php
session_start();
include './../../Constants/config.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
if (empty($_POST['username']) && empty($_POST['password'])) {
    header('Location:signinPage.php?error=Username and password are required');
} else if (empty($_POST['username'])) {
    header('Location:signinPage.php?error=Username is required');
} else if (empty($_POST['password'])) {
    header('Location:signinPage.php?error=Password is required');
}

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM SB_Users WHERE phonenumber = $_POST[username] AND password = $_POST[password]";

    // use exec() because no results are returned
    $result = $conn->query($sql);
    $resultCheck = $result->rowCount();
    if ($resultCheck > 0) {
        while ($row = $result->fetch()) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            if ($_SESSION) {
                // echo "<script type='text/javascript'>location.href = './../ProfilePage/profile.php';</script>";
                header('Location: ./../ProfilePage/profile.php');
                exit();
            } else {
                header('Location: ./signinPage.php?error=Invalid username or password');
                exit();
            }
        }
    } else {
        header("Location: ./signinPage.php?error=Invalid username or passwords");
        exit();
    }

    ;
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}

?>