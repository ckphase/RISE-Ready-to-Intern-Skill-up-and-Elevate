<?php
include('dbms/connection.php');

// Get all users
$result = mysqli_query($db, "SELECT id, password FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $password = $row['password'];

    // Skip already hashed passwords (hashed ones start with '$2y$')
    if (strpos($password, '$2y$') !== 0) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $update = mysqli_query($db, "UPDATE users SET password = '$hashed' WHERE id = $id");

        if ($update) {
            echo "User ID $id updated<br>";
        } else {
            echo "Error updating user $id: " . mysqli_error($db) . "<br>";
        }
    }
}
echo "DONE";
?>
