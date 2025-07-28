<?php
include('../dbms/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete by setting status to inactive
    $query = "UPDATE users SET status = 'inactive' WHERE id = '$id' AND role = 'company'";

    if (mysqli_query($db, $query)) {
        echo "<script>
                alert('Company Rejected Successfully!');
                window.location.href = 'adminCompaniesApprove.php';
              </script>";
    } else {
        echo "<script>
                alert('Company Not Rejected!');
                window.location.href = 'adminCompaniesApprove.php';
              </script>";
    }
}
?>
