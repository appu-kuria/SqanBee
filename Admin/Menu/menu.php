<html lang="en">
<?php
session_start();
include './../../Constants/config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./menu.css">
    <title>Menu</title>
</head>

<body>
    <div class="container">
        <div class="title">Add Menu</div>
        <form method="post" action="./menuDB.php" name="brandForm" onsubmit="return validate()">
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Add menu for
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
            </div>
            <div class="user_details">

                <div class="input_pox">
                    <!-- <span class="datails">Outlet Name</span> -->
                    <input type="text" placeholder="Category Name" name="categoryName" id="categoryName">
                    <span class="error-message" id="errCatName">Please enter a valid category name</span>
                    <div id="lblCategory">Add items for category - </div>
                </div>
                <div>
                    <input type="button" value="Add Items" id="btnCreateCategory" onclick="createCategory()">
                </div>
            </div>
            <div class="user_details" id="itemDetails">
                <div class="input_pox">
                    <span class="datails">Item Name *</span>
                    <input type="text" placeholder="" name="itemName" id="itemName">
                    <span class="error-message" id="errName">Please enter a valid item name.</span>
                </div>

                <div class="input_pox">
                    <span class="datails">Description</span>
                    <input type="text" placeholder="" name="description" id="description">
                </div>
                <div class="input_pox">
                    <span class="datails">Price *</span>
                    <input type="text" placeholder="" name="price" id="price">
                    <span class="error-message" id="errPrice">Please enter a valid price.</span>
                </div>
                <div class="input_pox">
                    <span class="datails">Tag</span>
                    <input type="text" placeholder="" name="tag" id="tag">
                </div>
                <div class="button">
                    <input type="button" value="Save" id="saveItem" onClick="addItem()">
                </div>
            </div>

            <div class="button">
                <input type="button" value="Add Another Category" id="addNewCategory" onclick="addAnotherCategory()">
                <p></p>
                <input type="submit" onclick="sendData()" value="Continue" id="submit">
            </div>
            <div id="addedItems">

            </div>
            <input type="text" placeholder="" name="categories" id="categories" hidden>
            <input type="text" placeholder="" name="items" id="items" hidden>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./menu.js"></script>
</body>

</html>