<?php
require_once '../../views/connection.php';
$categoryID = $_GET['id'];

$sql = $connect->query(
    "DELETE FROM categories WHERE category_id='$categoryID'"
);

header('location:../views/categories.php?d=yes');

?>
