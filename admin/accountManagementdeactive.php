<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE users SET status = 'inactive' WHERE id = '$id'";

    if (mysqli_query($db, $query)) {
        header("Location: adminAccountsManagement.php?msg=Account+inactivated+successfully");
    } else {
        header("Location: adminAccountsManagement.php?msg=Activation+failed");
    }
}
?>
