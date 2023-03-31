<?php
session_start();
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
        <div class="title">Hi
            <?php echo $_SESSION['firstName'] ?> Edit Brand Details
        </div>
        <form action="./brandDB.php" method="post" name="brandForm" onsubmit="return validate()">
            <div class="box transaction-box">
                <div class="header-container">
                    <h3 class="section-header">List of Brands</h3>
                </div>
                <table class="transaction-history">
                    <!-- <tr>
                                <th>Outlet Name</th>
                                <th>Brand Name
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#90A3BF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                        
                                </th>
                            </tr> -->
                    <?php
                    // $serverName = "localhost";
                    // $userName = "root";`
                    // $password = "";
                    // $dbName = "SQANBEE";
                    // $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
                    // if ($conn->connect_errno) {
                    //     echo("Connect failed: %s\n". $conn->connect_error);
                    //     exit();
                    // }else{
                    // }
                    //                             //Read Data from DB
                    //                                 $sql = "SELECT * FROM SB_Brands WHERE user_id = $_SESSION[user_id];";
                    //                                 $result = mysqli_query($conn, $sql);
                    //                                 $resultCheck = mysqli_num_rows($result);
                    //                                 if($resultCheck > 0){
                    //                                     while($row = mysqli_fetch_assoc($result)){
                    //                                         // echo '<tr><td>'.$row['brand_name'].'</td></tr>';
                    //                                         echo "<tr><td></td><td>".$row['brand_name']."</td></tr>";
                    //                                     };
                    //                                 }else{
                    //                                     echo "No results to display";
                    //                                 }
                    ?>
                    <tr>
                        <td> <input type="text" placeholder="" id="0" value="Brand 1" disabled="true"></td>
                        <td><input type="button" value="Edit" onclick="editBrand(0)"></td>
                        <td><input type="button" value="Delete" id="delete_0" onclick="deleteBrand(0)"></td>
                    </tr>
                    <tr>
                        <td> <input type="text" placeholder="" id="1" value="Brand 2" disabled="true"></td>
                        <td><input type="button" value="Edit" onclick="editBrand(1)"></td>
                        <td><input type="button" value="Delete" id="delete_1" onclick="deleteBrand(1)"></td>
                    </tr>
                    <tr>
                        <td> <input type="text" placeholder="" id="2" value="Brand 3" disabled="true"></td>
                        <td><input type="button" value="Edit" onclick="editBrand(2)"></td>
                        <td><input type="button" value="Delete" id="delete_2" onclick="deleteBrand(2)"></td>
                    </tr>
                    <tr>
                        <td> <input type="text" placeholder="" id="3" value="Brand 4" disabled="true"></td>
                        <td><input type="button" value="Edit" onclick="editBrand(3)"></td>
                        <td><input type="button" value="Delete" id="delete_3" onclick="deleteBrand(3)"></td>
                    </tr>

                </table>
                <div></div>
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