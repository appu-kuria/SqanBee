<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include "./../Constants/config.php";

            $sql = "SELECT * FROM SB_Users";
            $result = $conn -> query($sql) or die($conn -> error);
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '<pre>';
            }
        ?>
        <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Phone number</th>
                    </tr>
                </thead>
            <?php
                while($row = $result -> fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['phonenumber'] ?></td>
                    </tr>
                    <?php endwhile; ?>
            </table>

        </div>
        </div>
        This is the menu page
        <?php
            $data = $_GET['id'];
            echo "The id is ".$data
        ?>
        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

