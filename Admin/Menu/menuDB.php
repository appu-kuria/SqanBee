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
include './../../Constants/config.php';

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

//Inserting Categories
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $query;
    $conn->exec($sql);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}

//Fetching inserted categories

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM sb_category WHERE outlet_id =" . $outlet_id;

    // use exec() because no results are returned
    $categories = $conn->query($sql);
    $itemsQuery = 'INSERT INTO sb_menu (category_id, item_name, item_description,item_price, item_tag, is_active) VALUES ';
    $query_parts = array();
    $i = 0;
    while ($category = $categories->fetch()) {
        $itemsForCategory = array_filter($items, array(new CategoryFilter($category['category_name']), 'isSameCategory'));
        if (count($itemsForCategory) > 0) {
            foreach ($itemsForCategory as $value) {
                $query_parts[$i] = "(" . $category['category_id'] . ", '" . $value->name . "', '" . $value->description . "', " . $value->price . ", '" . $value->tag . "', " . '1' . ")";
                $i++;
            }
        }
    }
    ;
    $itemsQuery .= implode(',', $query_parts);
    $conn->exec($itemsQuery);
    $conn = null;
} catch (PDOException $e) {
    echo "Error is : " . $sql . "<br>" . $e->getMessage();
}

?>

<script type="text/javascript">location.href = './../ProfilePage/profile.php';</script>