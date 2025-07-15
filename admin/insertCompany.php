<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete by setting status to inactive
    $query = "UPDATE users SET status = 'active' WHERE id = '$id' AND role = 'company'";

    if (mysqli_query($db, $query)) {
        echo "<script> window.location.assign('adminCompaniesApprove.php?msg=Company Updated Successfully!') </script>";
        exit();
    } else {
        echo "<script> window.location.assign('adminCompaniesApprove.php?msg=Company Not updated!') </script>";
        exit();
    }
}
?>
