<?php
session_start();
include './../../../Constants/config.php';
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./brand.css">
    <title>Brand</title>
</head>

<body onload="onLoad()">
    <div class="container">
        <div class="title">
            Edit Brand Details
        </div>
        <form action="./brandDB.php" method="post" name="brandForm" onsubmit="return validate()">
            <div class="box transaction-box">
                <div class="header-container">
                    <h3 class="section-header">List of Brands</h3>
                </div>
                <table class="transaction-history">

                    <?php
                    $sql = "SELECT * FROM sb_brands WHERE user_id = $_SESSION[user_id];";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<tr>
                            <td> <input type=\"text\"  id=\"" . $row['brand_id'] . "\" value=\"" . $row['brand_name'] . "\" disabled=\"true\"></td>
                            <td><input type=\"button\" value=\"Edit\" id=\"edit_" . $row['brand_id'] . "\" onclick=\"editBrand(" . $row['brand_id'] . ",'". $row['brand_name'] ."')\"></td>
                            <td><input type=\"button\" value=\"Delete\" id=\"delete_" . $row['brand_id'] . "\" onclick=\"deleteBrand(" . $row['brand_id'] . ")\"></td>
                            </tr>";
                        }
                        ;
                    }

                    ?>

                </table>
                <div></div>
            </div>
            <div class="container1" id="editPopup" hidden>
                <!-- <div class="box1">ergggggggggggggggggfrdghbregerg</div> -->
                <div class="box1 overlay1">

                    <input type="text" id="editName" >
                    <input type="button" value="Save" id="btnSave" >
                    <input type="text" value= "Cancel" id="btnCancel" >
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Cancel" id="cancel">
                <input type="submit" value="Save Changes" id="submit">
            </div>


        </form>
    </div>
    <script src="./brand.js"></script>
</body>

</html>