<?php
$db = mysqli_connect("localhost", "root", "", "rise3.0");
if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>