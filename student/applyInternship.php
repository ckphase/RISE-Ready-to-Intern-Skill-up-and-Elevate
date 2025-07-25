<?php
session_start();
include('../dbms/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = intval($_POST['student_id']);
    $internship_id = intval($_POST['internship_id']);

    // Check if already applied
    $check = "SELECT * FROM applications WHERE student_id = $student_id AND internship_id = $internship_id";
    $res = mysqli_query($db, $check);

    if (mysqli_num_rows($res) > 0) {
        $_SESSION['msg'] = "⚠️ You have already applied for this internship.";
    } else {
        $insert = "INSERT INTO applications (student_id, internship_id, status) VALUES ($student_id, $internship_id, 'applied')";
        if (mysqli_query($db, $insert)) {
            $_SESSION['msg'] = "✅ Application submitted successfully!";
        } else {
            $_SESSION['msg'] = "❌ Failed to apply.";
        }
    }

    header("Location: studentInternships.php");
    exit();
}
?>
