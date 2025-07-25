<?php
session_start();
include('../dbms/connection.php');

// Step 1: Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    $_SESSION['msg'] = "Please login to apply.";
    header("Location: studentLogin.php");
    exit();
}

$student_id = intval($_SESSION['student_id']);

// Step 2: Check if internship_id is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['internship_id'])) {
    $internship_id = intval($_POST['internship_id']);

    // Step 3: Check if student exists in users table
    $checkStudent = mysqli_prepare($db, "SELECT id FROM users WHERE id = ? AND role = 'student'");
    mysqli_stmt_bind_param($checkStudent, "i", $student_id);
    mysqli_stmt_execute($checkStudent);
    $result = mysqli_stmt_get_result($checkStudent);

    if (mysqli_num_rows($result) === 0) {
        $_SESSION['msg'] = "Student not found in users table.";
        header("Location: studentCompanies.php");
        exit();
    }

    // Step 4: Check if already applied
    $check = mysqli_prepare($db, "SELECT id FROM applications WHERE student_id = ? AND internship_id = ?");
    mysqli_stmt_bind_param($check, "ii", $student_id, $internship_id);
    mysqli_stmt_execute($check);
    $checkResult = mysqli_stmt_get_result($check);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['msg'] = "You have already applied to this internship.";
        header("Location: studentCompanies.php");
        exit();
    }

    // Step 5: Insert into applications
    $insert = mysqli_prepare($db, "INSERT INTO applications (student_id, internship_id) VALUES (?, ?)");
    mysqli_stmt_bind_param($insert, "ii", $student_id, $internship_id);

    if (mysqli_stmt_execute($insert)) {
        $_SESSION['msg'] = "Application successful!";
    } else {
        $_SESSION['msg'] = "Application failed: " . mysqli_error($db);
    }

    header("Location: studentCompanies.php");
    exit();
} else {
    $_SESSION['msg'] = "Invalid application request.";
    header("Location: studentCompanies.php");
    exit();
}
