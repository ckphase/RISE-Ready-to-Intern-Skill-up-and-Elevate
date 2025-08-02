<?php
session_start();
include("companyHeader.php");
include('../dbms/connection.php');

// Redirect if not logged in
if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$application_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($application_id <= 0) {
    echo "<div class='alert alert-danger mt-4'>Invalid application ID.</div>";
    exit();
}

// ✅ Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $newStatus = mysqli_real_escape_string($db, $_POST['status']);
    $updateQuery = "UPDATE applications SET status = '$newStatus' WHERE id = $application_id";
    if (mysqli_query($db, $updateQuery)) {
        echo "<script>alert('Status updated successfully'); window.location.href='viewApplication.php?id=$application_id';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger'>Failed to update status.</div>";
    }
}

// ✅ Fetch application details
$sql = "
    SELECT 
        a.id AS application_id,
        u.name AS student_name,
        u.email AS student_email,
        u.contact AS student_contact,
        i.title AS internship_title,
        i.description AS internship_desc,
        a.status,
        a.applied_at
    FROM applications a
    JOIN internships i ON a.internship_id = i.id
    JOIN users u ON a.student_id = u.id
    WHERE a.id = $application_id
    LIMIT 1
";

$result = mysqli_query($db, $sql);
if (!$result || mysqli_num_rows($result) === 0) {
    echo "<div class='alert alert-warning mt-4'>Application not found.</div>";
    exit();
}

$row = mysqli_fetch_assoc($result);
$currentStatus = $row['status'];
?>

<!-- View Page UI -->
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Application Details</h4>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <!-- Student Info -->
                <div class="col-md-12">
                    <h5 class="mb-3">Student Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> <?= htmlspecialchars($row['student_name']) ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($row['student_email']) ?></li>
                        <li class="list-group-item"><strong>Contact:</strong> <?= htmlspecialchars($row['student_contact']) ?></li>
                        <?php if (!empty($row['student_resume'])): ?>
                            <li class="list-group-item"><strong>Resume:</strong>
                                <a href="../resumes/<?= htmlspecialchars($row['student_resume']) ?>" target="_blank" class="text-primary">View Resume</a>
                            </li>
                        <?php else: ?>
                            <li class="list-group-item"><strong>Resume:</strong> Not Uploaded</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Internship Info -->
                <div class="col-md-12">
                    <h5 class="mb-3">Internship Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Title:</strong> <?= htmlspecialchars($row['internship_title']) ?></li>
                        <li class="list-group-item"><strong>Description:</strong>
                            <p class="mt-2 mb-0"><?= nl2br(htmlspecialchars($row['internship_desc'])) ?></p>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <!-- Status Section -->
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-2">Application Status</h5>
                    <form method="POST" class="d-flex align-items-center">
                        <select name="status" class="form-select w-auto me-3">
                            <option value="applied" <?= $currentStatus === 'applied' ? 'selected' : '' ?>>Applied</option>
                            <option value="accepted" <?= $currentStatus === 'accepted' ? 'selected' : '' ?>>Accepted</option>
                            <option value="rejected" <?= $currentStatus === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                        <button type="submit" name="update_status" class="btn btn-outline-success">Update</button>
                    </form>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <small class="text-muted">Applied on: <?= date('F j, Y \a\t g:i A', strtotime($row['applied_at'])) ?></small>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <a href="companyReceived.php" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Applications
                </a>
            </div>
        </div>
    </div>
</div>

<?php include("companyFooter.php"); ?>
