<?php
session_start();

include './../../Constants/config.php';
// echo "about to start connect database operation ";
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {
    // echo "<br>No error in connection with db";
}
?>
<?php
// echo $_SERVER['REQUEST_URI'];
$qr = $_SESSION["scanned_qr"];
// echo $qr;
?>

<html lang="en">
<?php
// session_start();
include './../../Constants/config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mapQR.css">
    <title>Map QR to Outlet</title>
</head>

<body>
    <div class="container">
        <div class="title">Map QR to Outlet</div>
        <form method="post" action="./menuDB.php" name="brandForm" onsubmit="return validate()">
            <div class="user_details">
                <div class="input_pox">
                    <span class="datails">Select Brand
                        <select id="brand_id" onchange="onBrandSelect()">
                            <option value="" selected disabled>Select a brand</option>
                            <?php
                            $sql = "SELECT * FROM SB_Brands WHERE user_id = $_SESSION[user_id];";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            if ($resultCheck > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=" . $row['brand_id'] . ">" . $row['brand_name'] . "</option>";
                                }
                                ;
                            }

                            ?>
                        </select>
                    </span>
                </div>
                <div class="input_pox">
                    <span class="datails">
                        <select id="outlet_id" name="outlet_id">
                            <option value="">Select Outlet</option>
                        </select>
                    </span>
                </div>
                

                <div class="input_pox">
                    <span class="datails">Scanned QR ID</span>
                    <input type="text" name="qr" id="qr" value="<?php echo $qr; ?>" disabled>
                </div>
            </div>

            <div class="button">
                <input type="button" value="Map QR to the Outlet" id="addNewCategory" onclick="mapQR()">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./mapQR.js"></script>
</body>

</html>