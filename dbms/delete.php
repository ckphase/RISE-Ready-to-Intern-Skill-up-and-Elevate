<?php
include('connection.php');
$deletedId = $_GET["id"];
$query = "DELETE FROM `users` where `id` = '$deletedId'";
$result = mysqli_query($db, $query);
// print_r($result);
echo "<script>alert('User deleted successfully'); window.location.href='adminAllUsers.php';</script>";
?>