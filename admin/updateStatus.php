<?php
include('../dbms/connection.php');

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $allowed = ['resolved', 'unresolved'];
    if (in_array($status, $allowed)) {
        $query = "UPDATE reports SET status='$status' WHERE id=$id";
        if (mysqli_query($db, $query)) {
            header("Location: adminApplications.php"); // Change to your actual report page
            exit;
        } else {
            echo "Error updating status.";
        }
    } else {
        echo "Invalid status.";
    }
} else {
    echo "Missing parameters.";
}
?>
