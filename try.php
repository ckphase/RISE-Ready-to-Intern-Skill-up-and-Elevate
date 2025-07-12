<?php
include('connection.php');
$query = "SELECT * FROM internships";
$result = mysqli_query($db, $query);
// print_r($result);
while ($row = mysqli_fetch_assoc($result)) ;
?>