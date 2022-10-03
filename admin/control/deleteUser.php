<?php
require_once '../../views/connection.php';
$userID = $_GET['id'];

$sql = $connect->query("DELETE FROM users WHERE user_id='$userID'");

header('location:../views/users.php?d=yes');

?>
