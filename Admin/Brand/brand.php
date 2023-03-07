
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
        <div class="title">Add Brand Details</div>
        <form action="./../Outlet/outlet.php" method="post" name="brandForm" onsubmit= "return validate()">
            <div class="user_details">
                <div class="input_pox">
                    <span class="datails">Brand Name</span>
                    <input type="text" placeholder="Eg: My Brand" name="brandName" id="brandName">
                </div>
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
                <input type="submit" value="Proceed to Add Outlet" id="submit"> 
            </div>
        </form>
    </div>
    <script src="./brand.js"></script>
</body>
</html>