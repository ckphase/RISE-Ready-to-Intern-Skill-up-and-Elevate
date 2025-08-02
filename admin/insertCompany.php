<?php
session_start();
include('../dbms/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete by setting status to inactive
    $query = "UPDATE users SET status = 'active' WHERE id = '$id' AND role = 'company'";

    if (mysqli_query($db, $query)) {
        echo "<script>
                alert('Company Accepted Successfully!');
                window.location.href = 'adminCompaniesApprove.php?id=" . $id . "';
              </script>";
    } else {
        echo "<script>
                alert('Company Not Accepted!');
                window.location.href = 'adminCompaniesApprove.php?id=" . $id . "';
              </script>";
    }
}
?>
