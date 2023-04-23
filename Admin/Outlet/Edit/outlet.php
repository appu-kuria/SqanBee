<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./outlet.css">
    <title>Outlet</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./outlet.js"></script>
</head>
<?php
session_start();
include './../../../Constants/config.php';
?>
<body onload="onLoad()">
    <div class="container">
        <div class="title">Add Outlet</div>
        <form action="./editOutletDB.php" method="post" name="brandForm" onsubmit="return validate()">
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Edit outlet for
                        <select id="brand_id" onchange="onBrandSelect()">
                            <option value="" selected disabled>Select a brand</option>
                            <?php
                                $sql = "SELECT * FROM SB_Brands WHERE user_id = $_SESSION[user_id];";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value=".$row['brand_id'].">".$row['brand_name']."</option>";
                                    };
                                }
                                
                            ?>
                            <option value="Select">Select</option>
                        </select>
                    </span>
                </div>
                <div class="input_pox">
                    <span class="datails">
                        <select id="outlet_id" name ="outlet_id" onchange="onOutletSelect()">
                            <option value="">Select Outlet</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Outlet Name</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="outletName" id="outletName">
                </div>
                <div class="input_pox">
                    <span class="datails">Building No</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="buildingNo" id="buildingNo">
                </div>
                <div class="input_pox">
                    <span class="datails">Place</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="place" id="place">
                </div>  
                <div class="input_pox">
                    <span class="datails">City</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="city" id="city">
                </div>
                <div class="input_pox">
                    <span class="datails">State</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="state" id="state">
                </div>

                <div class="input_pox">
                    <span class="datails">Phone</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="phone" id="phone">
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
                    <input type="submit" value="Save Changes" id="submit">
                </div>

            </div>
        </form>
    </div>
</body>

</html>