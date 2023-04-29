<?php
session_start();
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
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./outlet.css">
    <title>Outlet</title>
</head>

<body onload="onLoad()">
    <div class="container">
        <div class="title">Add Outlet</div>
        <form action="./addOutletDB.php" method="post" name="brandForm" onsubmit="return validate()">
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Create outlet for
                        <?php

                        try {
                            $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
                            // set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM SB_Brands WHERE user_id = $_SESSION[user_id];";

                            // use exec() because no results are returned
                            $result = $conn->query($sql);
                            $resultCheck = $result->rowCount();
                            if ($resultCheck > 0) {
                                echo "<select name=\"brand_id\">";
                                echo "<option size =30 ></option>";
                                while ($row = $result->fetch()) {
                                    echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                                }
                                echo "</select>";
                            } else {
                                echo "No results to display";
                            }
                            $conn = null;
                        } catch (PDOException $e) {
                            echo "Error is : " . $sql . "<br>" . $e->getMessage();
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Outlet Name</span>
                    <input type="text" placeholder="Eg: My Outlet" name="outletName" id="outletName">
                </div>
                <div class="input_pox">
                    <span class="datails">Building No</span>
                    <input type="text" placeholder="Eg: 1234" name="buildingNo" id="buildingNo">
                </div>
                <div class="input_pox">
                    <span class="datails">Place</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="place" id="place">
                </div>
                <div class="input_pox">
                    <span class="datails">City</span>
                    <input type="text" placeholder="Eg:Kochi" name="city" id="city">
                </div>
                <div class="input_pox">
                    <span class="datails">State</span>
                    <input type="text" placeholder="Eg:Kerala" name="state" id="state">
                </div>

                <div class="input_pox">
                    <span class="datails">Phone</span>
                    <input type="text" placeholder="Eg:9999999999" name="phone" id="phone">
                </div>
                <!-- <div class="gender_details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="gender_title"> Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Mail</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Femail</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Perer not to say</span>
                    </label>
                </div>
            </div> -->
                <div class="button">
                    <input type="submit" value="Create Outlet" id="submit">
                </div>

            </div>
        </form>
    </div>
    <script src="./outlet.js"></script>
</body>

</html>