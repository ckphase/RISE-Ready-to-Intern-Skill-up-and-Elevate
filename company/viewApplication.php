<?php
session_start();
include("companyHeader.php");
include('../dbms/connection.php');

if (!isset($_GET['id'])) {
    echo "<div class='alert alert-danger'>Invalid application ID.</div>";
    exit();
}
if (!isset($_GET['id'])) {
    die("No application ID provided.");
}
$application_id = intval($_GET['id']);


$query = "
    SELECT 
        a.id AS application_id,
        a.status,
        a.applied_at,
        u.name,
        u.email,
        u.contact,
        i.title AS internship_title,
        s.resume,
        s.portfolio,
        s.skills,
        s.experience,
        s.linkedin_id
    FROM applications a
    JOIN students s ON a.student_id = s.id
    JOIN users u ON s.user_id = u.id
    JOIN internships i ON a.internship_id = i.id
    WHERE a.id = $application_id
";


$result = mysqli_query($db, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-warning'>Application not found.</div>";
    exit();
}

$data = mysqli_fetch_assoc($result);
?>

<!-- ✅ View Application Details -->
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-4">Application #<?= $data['application_id'] ?></h4>

            <div class="mb-3">
                <strong>Student Name:</strong> <?= htmlspecialchars($data['student_name']) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($data['student_email']) ?><br>
                <strong>Contact:</strong> <?= htmlspecialchars($data['student_contact']) ?><br>
                <strong>Applied On:</strong> <?= date('M d, Y', strtotime($data['applied_at'])) ?><br>
                <strong>Status:</strong> <?= ucfirst($data['status']) ?>
            </div>

            <div class="mb-3">
                <strong>Internship Title:</strong> <?= htmlspecialchars($data['internship_title']) ?>
            </div>

            <?php if (!empty($data['resume_path'])): ?>
                <div class="mb-3">
                    <strong>Resume:</strong> <a href="../uploads/<?= $data['resume_path'] ?>" target="_blank">Download</a>
                </div>
            <?php endif; ?>

            <?php if (!empty($data['portfolio'])): ?>
                <div class="mb-3">
                    <strong>Portfolio:</strong> <a href="<?= $data['portfolio'] ?>" target="_blank">View</a>
                </div>
            <?php endif; ?>

            <?php if (!empty($data['linkedin_id'])): ?>
                <div class="mb-3">
                    <strong>LinkedIn:</strong> <a href="<?= $data['linkedin_id'] ?>" target="_blank">Profile</a>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <strong>Skills:</strong><br>
                <?= nl2br(htmlspecialchars($data['skills'])) ?>
            </div>

            <div class="mb-3">
                <strong>Experience:</strong><br>
                <?= nl2br(htmlspecialchars($data['experience'])) ?>
            </div>

            <a href="companyReceived.php" class="btn btn-secondary">← Back to Applications</a>
        </div>
    </div>
</div>

<?php include("companyFooter.php"); ?>
