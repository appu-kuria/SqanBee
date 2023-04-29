<?php
session_start();
include './../../Constants/config.php';

$qr = $_SESSION["scanned_qr"];
?>

<html lang="en">

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
                            try {
                                $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "SELECT * FROM SB_Brands WHERE user_id = $_SESSION[user_id];";

                                // use exec() because no results are returned
                                $result = $conn->query($sql);
                                while ($row = $result->fetch()) {
                                    echo "<option value=" . $row['brand_id'] . ">" . $row['brand_name'] . "</option>";
                                }
                                ;
                                $conn = null;
                            } catch (PDOException $e) {
                                echo "Error is : " . $sql . "<br>" . $e->getMessage();
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