<html>
    <head>
        <title>SqanBee</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php
            $shopId = "2";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $shopId = "2";
            }
        ?>
        <h4>Welcome to SqanBee</h4>
        <br>
        <form action="./../SignUp/SignUpPage/signUpPage.php?id=2" method="POST">
        <button type="submit" class="btn btn-success">New Registration</button>
        </form>
        <form action="./../MenuPage/menuPage.php?id=2" method="POST">
        <button type="submit" class="btn btn-success">Map to existing outlet</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>