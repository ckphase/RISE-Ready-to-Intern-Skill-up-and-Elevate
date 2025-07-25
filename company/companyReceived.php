<?php
session_start();

// Ensure session has company_id
if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}
$company_id = $_SESSION['company_id'];

// DB connection
include('../dbms/connection.php');

// Fetch applications with student & internship details
$query = "
    SELECT 
        a.id AS application_id,
        u.name AS student_name,
        u.email AS student_email,
        u.contact AS student_contact,
        i.title AS internship_title,
        a.status,
        a.applied_at
    FROM applications a
    JOIN students s ON a.student_id = s.id
    JOIN users u ON s.user_id = u.id
    JOIN internships i ON a.internship_id = i.id
    WHERE i.company_id = $company_id
    ORDER BY a.applied_at DESC
";

$result = mysqli_query($db, $query);
?>

<?php include("companyHeader.php"); ?>

<div class="container-fluid text-white" style="background: rgba(136, 211, 238, 1); padding: 40px 0;">
    <div class="container">
        <h2 class="fw-bold mb-1 text-black" style="letter-spacing: 1px;">Review Applications</h2>
        <h4 class="mb-0 text-light">Applications Received for Your Internships</h4>
    </div>
</div>

<div class="container py-5">
    <div class="card border-3 shadow">
        <div class="card-body">
            <h4 class="mb-4">Student Applications</h4>

            <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Student</th>
                            <th>Internship</th>
                            <th>Status</th>
                            <th>Applied On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-info text-white d-flex justify-content-center align-items-center me-2" style="width: 40px; height: 40px;">
                                        <?= strtoupper(substr($row['student_name'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <strong><?= htmlspecialchars($row['student_name']) ?></strong><br>
                                        <small class="text-muted"><?= htmlspecialchars($row['student_email']) ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($row['internship_title']) ?></td>
                            <td>
                                <span class="badge 
                                    <?= $row['status'] == 'accepted' ? 'bg-success' : ($row['status'] == 'rejected' ? 'bg-danger' : 'bg-warning text-dark') ?>">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>
                            <td><?= date('M d, Y', strtotime($row['applied_at'])) ?></td>
                            <td>
                                <a href="viewApplication.php?id=<?= $row['application_id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="alert alert-info">No applications have been submitted yet.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("companyFooter.php"); ?>
