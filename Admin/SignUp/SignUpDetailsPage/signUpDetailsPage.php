<html>
    <head>
        <title>SqanBee - Registration Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        
        <form action="./../../BrandPage/newBrandPage.php" method="POST">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" name="firstName" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" name="lastName" aria-label="Last name">
                    </div>
                </div>
                <div class="row">
                <div class="col">
                    <input type="text" class="form-control" value=<?php echo $_POST["phonenumber"]?> aria-label="phone number" disabled>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Alternate Phone number" aria-label="alternate phone number" >
                </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Building Number" aria-label="Building Number">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Locality" aria-label="Locality">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="City" aria-label="City">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="District" aria-label="District">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Post Office" aria-label="Post">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Pincode" aria-label="Pincode">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="State" aria-label="State">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Country" aria-label="Country">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Add Restaurant Details</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" disabled>Save and Exit</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>