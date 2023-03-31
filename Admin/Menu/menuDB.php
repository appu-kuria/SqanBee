<?php
class CategoryFilter
{
    private $categName;
    function __construct($categName)
    {
        $this->categName = $categName;
    }
    function isSameCategory($i)
    {
        return $i->category == $this->categName;
    }
}
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "SQANBEE";
$conn = new mysqli($serverName, $userName, $password, $dbName) or die(mysqli_error($conn));
if ($conn->connect_errno) {
    echo ("Connect failed: %s\n" . $conn->connect_error);
    exit();
} else {
    echo "<br>No error in connection with db";
}

$categories = json_decode($_POST['categories']);
$items = json_decode($_POST['items']);
$outlet_id = $_POST['outlet_id'];

$query = 'INSERT INTO sb_category (outlet_id, category_name,is_active) VALUES ';
$query_parts = array();
$i = 0;
foreach ($categories as $value) {
    $query_parts[$i] = "(" . $outlet_id . ", '" . $value . "', " . '1' . ")";
    $i++;
}
$query .= implode(',', $query_parts);
mysqli_query($conn, $query);
if (mysqli_error($conn)) {
    echo "Problem occured in db push";
}


$sql = "SELECT * FROM sb_category WHERE outlet_id =".$outlet_id;
$categories = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($categories);
$itemsQuery = 'INSERT INTO sb_menu (category_id, item_name, item_description,item_price, item_tag, is_active) VALUES ';
$query_parts = array();
$i = 0;
if ($resultCheck > 0) {
    while ($category = mysqli_fetch_assoc($categories)) {
        $itemsForCategory = array_filter($items, array(new CategoryFilter($category['category_name']), 'isSameCategory'));
        if (count($itemsForCategory) > 0) {
            foreach ($itemsForCategory as $value) {
                echo $value->name;
                echo $value->description;
                $query_parts[$i] = "(" . $category['category_id'] . ", '" . $value->name . "', '" . $value->description . "', " . $value->price . ", '" . $value->tag . "', " . '1' . ")";
                $i++;
            }
        }
    }
    echo $itemsQuery .= implode(',', $query_parts);
    mysqli_query($conn, $itemsQuery);
    if (mysqli_error($conn)) {
        echo "Problem occured in db push";
    }

} else {
    // echo "No results to display";
}

// foreach ($categories as $value) {
//     echo "$value <br>";
// }
?>

<!-- <script type="text/javascript">location.href = './../ProfilePage/profile.php';</script> -->