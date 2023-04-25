<html>
    <head>
        <title>Sign In</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./signin.css">
    <body>
    <?php 
    // include './../../Constants/config.php';

    // $conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
    // if ($conn->connect_errno) {
    //     echo("Connect failed: %s\n". $conn->connect_error);
    //     exit();
    // }else{
    //     echo"<br>No error in connection with db";
    // }
?>

        <!-- <form action="" method="POST">
            <select name='user'>
                
        <?php
            //Read Data from DB
            // $sql = "SELECT * FROM SB_Users WHERE is_active;";
            // $result = mysqli_query($conn, $sql);
            // $resultCheck = mysqli_num_rows($result);
            // if($resultCheck > 0){
            //     echo "There are some result<br>";
            //     while($row = mysqli_fetch_assoc($result)){
            //         echo "<option value=".$row['user_id'].">".$row['firstName']."</option>";
            //     };
            // }else{
            //     echo "No results to display";
            // }
        ?>
</select>
<br>
<input type="submit" name="submit" value="Sign In">
        </form> -->
        <?php
        // if(isset($_POST['submit'])){
        //     if(!empty($_POST['user'])) {
        //         $selected = $_POST['user'];
        //         $_SESSION['user_id'] = $selected;
        //         echo 'You have chosen:' . $selected;
        //         echo "Session value : ".$_SESSION['user_id'];
        //         header("Location: ./../ProfilePage/profile.php");
        //         exit();
        //     } else {
        //         echo 'Please select the value.';
        //     }
        //     }
        ?>
        <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="sqanbee logo goes here">
                  <h4 class="mt-1 mb-5 pb-1">The sQanning bee is about to fly</h4>
                </div>

                <form action="./signin.php" method="POST">
                  <p>Please login to your account</p>

                <!-- Checking for errors -->
                <?php
                    if(isset($_GET['error'])){
                        ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php
                    }
                ?>


                  <div class="form-outline mb-4">
                    <input type="text" name="username" id="form2Example11" class="form-control"
                      placeholder="Phone number" />
                    <!-- <label class="form-label" for="form2Example11">Username</label> -->
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="password" placeholder="Password" class="form-control" />
                    <!-- <label class="form-label" for="form2Example22">Password</label> -->
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                      in</button>
                    <a class="text-muted" href="./../ForgotPassword/forgotPasswordPage.php">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="./signin.js"></script>
    </body> 
</html>