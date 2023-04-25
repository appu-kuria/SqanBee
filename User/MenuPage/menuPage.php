<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./menuPage.css">
</head>

<body>
    <?php
    include './../../Constants/config.php';

    $sql = "SELECT * FROM `sb_category` C INNER JOIN sb_menu M ON C.category_id = M.category_id WHERE outlet_id =8";
    $result = $conn->query($sql) or die($conn->error);
    function pre_r($array)
    {
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
    ?>
    <div class="categoryListView">
        <div class="header_section display_flex space_between {{firstOrderView ? '' : 'overlay'}}">
            <div class="display_flex width_70">
                <div class="category_logo">
                    <img src="assets/user/img/CafeLogo.svg" alt="">
                </div>
                <div class="category_content">
                    <h1>Outlet Name</h1>
                    <h2>Outlet Address, Sample PO, Sample Place</h2>
                    <a href="./menusample.php"> Click here to go to Menu Sample Page</a>
                    <a href="./test.php"> Click here to go to Menu test Page</a>
                </div>
            </div>
            <div class="display_flex justify_end width_30">
                <div class="currency_label margin_right_16">
                    INR
                </div>
                <div class="translate_icon">
                    <img src="assets/user/img/Translate.svg" alt="">
                </div>
            </div>
        </div>
        <div class="category_item">

            <?php
            $resultCheck = mysqli_num_rows($result);
            $category = "";
            if ($resultCheck > 0) {
                $rows = [];
                // while ($row = mysqli_fetch_array($result)) {
                //     $rows[] = $row;
                // }
            

                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                    if ($row['category_name'] != $category) {
                        if ($category != "") {
                            echo "</div></div>";
                        }
                        echo "<div class=\"mat_accordion\">";
                        $category = $row['category_name'];
                        echo "<div class=\"category_name\">" . $row['category_name'] . "</div>";

                        echo "<div class= \"accordion_content\">";
                    }
                    echo "<div class=\"item_icon\">
                        <img src=\"./../../Assets/img/food.jpeg\" alt=\"\">
                    </div>";
                    echo "  <div class=\"item_details\">";
                    echo "<div  class=\"item_name\">" . $row['item_name'] . "</div>";
                    echo "<div class=\"item_price\">" . $row['item_price'] . "</div>";
                    echo "<div class=\"item_description_expanded\">" . $row['item_description'] . "</div>";
                    echo "</div>";

                    echo "<div class=\"item_add\">
                        <span  class=\"add_btn\" id=\"add_btn_" . $row['menu_id'] . "\">
                            <button onclick=\"addItemToCart(" . $row['menu_id'] . ",'" . $row['item_name'] . "')\">Add</button>
                        </span>
                        <span  class=\"plus_minus\" style=\"display:none\" id=\"plusMinus_" . $row['menu_id'] . "\"  >
                            <span class=\"input-group-btn\" onclick=\"removeItemFromCart(" . $row['menu_id'] . ")\">
                                <span>
                                    <img src=\"./../../Assets/img/minus.svg\">
                                </span>
                            </span>
                            <input class=\"input_count\"  id=\"count_" . $row['menu_id'] . "\" type=\"text\">
                            <span class=\"input-group-btn\" onclick=\"addItemToCart(" . $row['menu_id'] . ")\">
                                <span>
                                    <img src=\"./../../Assets/img/plus.svg\" alt=\"\">
                                </span>
                            </span>

                        </span>
                    </div>";
                }
            } else {
                echo "No results to display";
            }
            ?>

        </div>
    </div>


    <div id="orderCount" style="display:none" class="order_list">
        <div class="display_flex space_between flex_align_center">
            <div class="width_100">
                <div class="added_name">You've added</div>
                <div class="added_item" id="added_item"></div>
            </div>
            <div class="viewButton">
                <button class="list_btn" onclick="viewOrderList()">View Order List</button>
            </div>
        </div>
    </div>
    <div id="orderDetail" style="display:none" class="order_list height_change">
        <div>
            <div class="top_header_list display_flex space_between flex_align_center">
                <div class="display_flex flex_align_center">
                    <div onclick="backToOrderpage()">
                        <img src="./../../Assets/img/arrow-left.svg" alt="">
                    </div>
                    <div class="top_header_order_list">
                        Order List
                    </div>
                </div>
            </div>
            <div class="item_added_list" id="item_added_list">
                
            </div>
            <div class="bottom_button display_flex justify_center flex_align_center">
                <div class="payButton ordr_btns">
                    <button onclick="backToOrderpage()">Cancel</button>
                </div>
                <div class="viewButton ordr_btns">
                    <button onclick="makePayment()">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
    This is the menu page
    <?php
    $data = $_GET['id'];
    echo "The id is " . $data
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./menuPage.js"></script>
    <script type='text/javascript'>
        var itemsArray = <?php echo json_encode($rows); ?>;
        itemsArray.forEach(element => {
            element.count = 0;
        });
        console.log(itemsArray);

        var categories = [];
        itemsArray.forEach(function (item) {
            if (categories.findIndex(c => c == item.category_name) == -1) {
                categories.push(item.category_name);
            }
        });

        var category = '';

    </script>
</body>

</html>