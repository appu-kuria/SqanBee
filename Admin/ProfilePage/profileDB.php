<?php 
include './../../Constants/config.php';

session_start();

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM SB_Users WHERE user_id = $_SESSION[user_id];";

    // use exec() because no results are returned
    $result = $conn->query($sql);
    while ($row = $result->fetch()) {
        $_SESSION['user_id']=$row['user_id'];
    }
    ;
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}
?>
<script type="text/javascript">location.href = './profile.php';</script>