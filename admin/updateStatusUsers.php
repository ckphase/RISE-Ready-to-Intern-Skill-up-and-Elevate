<?php
include('../dbms/connection.php');

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Allow different statuses for different tables
    $allowedStatuses = ['resolved', 'unresolved', 'open', 'closed'];

    if (in_array($status, $allowedStatuses)) {
        $query = "UPDATE internships SET status='$status' WHERE id=$id";

        // If it's a report, update from reports table instead
        $checkQuery = "SELECT id FROM reports WHERE id=$id";
        $checkResult = mysqli_query($db, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $query = "UPDATE reports SET status='$status' WHERE id=$id";
        }

        if (mysqli_query($db, $query)) {
            // Redirect back to the correct page based on status type
            if ($status == 'open' || $status == 'closed') {
                header("Location: adminAccountsManagement.php?id=" . $id . ""); // Adjust if different filename
            } else {
                header("Location: adminAccountsManagement.php?id=" . $id . "");
            }
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
