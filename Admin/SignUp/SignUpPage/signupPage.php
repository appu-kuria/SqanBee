
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signupPage.css">
    <title>Document</title>
</head>
<body onload="onLoad()">
    <div class="container">
        <div class="title">Registration</div>
        <form action="./../../ProfilePage/profile.php" method="post">
            <div class="user_details">
                <div class="input_pox">
                    <span class="datails">First Name</span>
                    <input type="text" placeholder="Eg: Kevin" name="firstName" id="firstName" required>
                </div>
                <div class="input_pox">
                    <span class="datails">Last Name</span>
                    <input type="text" placeholder="Eg: Bruine" name="lastName" id="lastName" required>
                </div>
                <div class="input_pox">
                    <span class="datails">Email</span>
                    <input type="text" placeholder="someone@sqanbee.com" name="email"  id="email" required>
                </div>
                <div class="input_pox">
                    <span class="datails">Phone Number</span>
                    <input type="text" placeholder="Eg: 1234567890"  name="phone" id="phone" required>
                </div>
                <div class="input_pox">
                    <span class="datails">Password</span>
                    <input type="text" placeholder="enter your Password" name="password"  id="password" required>
                </div>
                <div class="input_pox">
                    <span class="datails">Confirm Password</span>
                    <input type="text" placeholder="Confirm your Password"  name="confirmPassword" id="confirmPassword" required>
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
                <div class="user_details" >
                    <div class="input_pox" >
                    <span class="datails">Enter OTP</span>
                    <input type="text" placeholder="1234" id="otp" required>
                    </div>
                </div>
            <div class="button" id="generateOTP"  onclick="generateOTP()">
                <input type="button" value="Generate OTP">
            </div>
            <div class="button">
                <input type="submit" value="Register" id="submit">
            </div>
        </form>
    </div>
    <script src="./signupPage.js"></script>
</body>
</html>