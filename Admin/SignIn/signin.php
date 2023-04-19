<html>
    <head>
        <title>Sign In</title>
    </head>
    <body>
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

        <form action="" method="POST">
            <select name='user'>
                
        <?php
            //Read Data from DB
            $sql = "SELECT * FROM SB_Users WHERE is_active;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0){
                echo "There are some result<br>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value=".$row['user_id'].">".$row['firstName']."</option>";
                };
            }else{
                echo "No results to display";
            }
        ?>
</select>
<br>
<input type="submit" name="submit" value="Sign In">
        </form>
        <?php
        if(isset($_POST['submit'])){
            if(!empty($_POST['user'])) {
                $selected = $_POST['user'];
                $_SESSION['user_id'] = $selected;
                echo 'You have chosen:' . $selected;
                echo "Session value : ".$_SESSION['user_id'];
                header("Location: ./../ProfilePage/profile.php");
                exit();
            } else {
                echo 'Please select the value.';
            }
            }
        ?>
        <script src="./signin.js"></script>
    </body> 
</html>