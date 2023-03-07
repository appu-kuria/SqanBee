<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./menu.css">
    <title>Menu</title>
</head>

<body onload="onLoad()">
    <div class="container">
        <div class="title">Add Menu</div>
        <form action="./../Outlet/outlet.php" method="post" name="brandForm" onsubmit="return validate()">
            <div class="user_details">

                <div class="input_pox">
                    <span class="datails">Add menu for
                        <select>
                            <option value="Select">Select Brand</option>
                            <option value="Vineet">Brand1</option>
                            <option value="Sumit">Brand2</option>
                        </select>
                    </span>
                </div>
                <div class="input_pox">
                    <span class="datails">
                        <select>
                            <option value="Select">Select Outlet</option>
                            <option value="Vineet">Outlet1</option>
                            <option value="Sumit">Outlet2</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="user_details">

                <div class="input_pox">
                    <!-- <span class="datails">Outlet Name</span> -->
                    <input type="text" placeholder="Category Name" name="categoryName" id="categoryName">
                </div>
            </div>
            <div class="user_details">
                <div class="input_pox">
                    <span class="datails">Place</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="place" id="place">
                </div>

                <div class="input_pox">
                    <span class="datails">Locality</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="locality" id="locality">
                </div>
                <div class="input_pox">
                    <span class="datails">Building No</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="buildingNo" id="buildingNo">
                </div>
                <div class="input_pox">
                    <span class="datails">City</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="city" id="city">
                </div>
                <div class="input_pox">
                    <span class="datails">State</span>
                    <input type="text" placeholder="Eg:Kakkanad" name="state" id="state">
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
    <script src="./menu.js"></script>
</body>

</html>