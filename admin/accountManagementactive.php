<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE users SET status = 'active' WHERE id = '$id'";

    if (mysqli_query($db, $query)) {
        header("Location: adminAccountsManagement.php?msg=Account+activated+successfully");
    } else {
        header("Location: adminAccountsManagement.php?msg=Activation+failed");
    }
}
?>
