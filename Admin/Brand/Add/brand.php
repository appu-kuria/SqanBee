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
        <div class="title">Hi <?php echo $_SESSION['firstName'] ?> Add Brand Details</div>
        <form action="./brandDB.php" method="post" name="brandForm" onsubmit= "return validate()">
            <div class="user_details">
                <div class="input_pox">
                    <span class="datails">Brand Name</span>
                    <input type="text" placeholder="Eg: My Brand" name="brandName" id="brandName">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Proceed to Add Outlet" id="submit"> 
            </div>
        </form>
    </div>
    <script src="./brand.js"></script>
</body>
</html>