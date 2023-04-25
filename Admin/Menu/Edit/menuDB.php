<?php
class CategoryFilter
{
    private $category_name;
    function __construct($category_name)
    {
        $this->category_name = $category_name;
    }
    function isSameCategory($i)
    {
        return $i->category_name == $this->category_name;
    }
}
session_start();
include './../../../Constants/config.php';

// $serverName = "localhost";
// $userName = "root";
// $password = "";
// $dbName = "SQANBEE";
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

$sql = 'DELETE FROM sb_category WHERE outlet_id ='.$outlet_id;
$RES = mysqli_query($conn, $sql);

$query = 'INSERT INTO sb_category (outlet_id, category_name,is_active) VALUES ';
$query_parts = array();
$i = 0;

foreach ($categories as $value) {
    $query_parts[$i] = "(" . $outlet_id . ", '" . $value->category_name . "', " . '1' . ")";
    $sql = 'DELETE FROM sb_menu WHERE category_id ='.$value->category_id;
    echo  $sql;
    $RES = mysqli_query($conn, $sql);

    $i++;
}
$query .= implode(',', $query_parts);
mysqli_query($conn, $query);
if (mysqli_error($conn)) {
    echo "Problem occured in db push";
}


$sql = "SELECT * FROM sb_category WHERE outlet_id =".$outlet_id;
echo $sql;
$categories = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($categories);
$itemsQuery = 'INSERT INTO sb_menu (category_id, item_name, item_description,item_price, item_tag, is_active) VALUES ';
$query_parts = array();
$i = 0;

echo "Count ".$resultCheck;
if ($resultCheck > 0) {
    while ($category = mysqli_fetch_assoc($categories)) {
        echo $category['category_name'];
        $itemsForCategory = array_filter($items, array(new CategoryFilter($category['category_name']), 'isSameCategory'));
        echo "\nItems in cat: ".count(($itemsForCategory));
        if (count($itemsForCategory) > 0) {
            foreach ($itemsForCategory as $value) {
                echo $value->item_name;
                echo $value->item_description;
                $query_parts[$i] = "(" . $category['category_id'] . ", '" . $value->item_name . "', '" . $value->item_description . "', " . $value->item_price . ", '" . $value->item_tag . "', " . '1' . ")";
                $i++;
            }
        }
    }
    $itemsQuery.= implode(',', $query_parts);
    echo "Insert Cat Query".$itemsQuery;
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