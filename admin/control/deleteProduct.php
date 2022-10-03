<?php
require_once '../../views/connection.php';
$productID = $_GET['id'];

$sql = $connect->query("DELETE FROM products WHERE product_id='$productID'");

header('location:../views/products.php?d=yes');

?>
