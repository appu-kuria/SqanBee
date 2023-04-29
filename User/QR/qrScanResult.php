<?php
session_start();
include './../../Constants/config.php';

$parts = parse_url($_SERVER['REQUEST_URI']);
parse_str($parts['query'], $query);
$qr = $query['qr'];
$_SESSION["scanned_qr"] = $qr;


try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM qr_codes WHERE qr_offline_id ='" . $qr . "'";
    $result = $conn->query($sql);
    $resultCheck = $result->rowCount();
    if ($resultCheck > 0) {
        while ($row = $result->fetch()) {
            $outletId = $row['outlet_id'];
            // echo $outletId;
            header('Location: ./../MenuPage/menusample.php?outlet_id=' . $outletId);
        }
    } else {
        header('Location: ./../../Admin/SignIn/signinPage.php');
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}

?>