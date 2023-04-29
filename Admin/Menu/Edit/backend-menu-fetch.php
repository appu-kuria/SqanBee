<?php

include './../../../Constants/config.php';

// $serverName = "localhost";
// $userName = "root";
// $password = "";
// $dbName = "SQANBEE";
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {
}

$outlet_id = !empty($_POST['outlet_id']) ? $_POST['outlet_id'] : '';
if (!empty($outlet_id)) {

    $sql = "SELECT * FROM sb_category WHERE outlet_id = $outlet_id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        }
        ;
    } else {
        echo "No data";
    }

    echo "###";
    $sql = "SELECT M.category_id, M.item_name, M.item_description, M.item_price, m.item_tag FROM sb_category C Inner Join sb_menu M on c.category_id = m.category_id  WHERE outlet_id = $outlet_id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        }
        ;
    } else {
        echo "No data";
    }
}
?>