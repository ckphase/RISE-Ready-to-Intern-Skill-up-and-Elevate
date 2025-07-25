<?php
session_start();
include("companyHeader.php");
include('../dbms/connection.php');

if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$user_id = $_SESSION['company_id'];

// ✅ Get actual company ID from `companies` table using user_id
$companyQuery = mysqli_query($db, "SELECT id FROM companies WHERE user_id = '$user_id'");
if (!$companyQuery || mysqli_num_rows($companyQuery) == 0) {
    die("<div class='alert alert-danger'>Company not found for this user ID</div>");
}
$companyRow = mysqli_fetch_assoc($companyQuery);
$company_id = $companyRow['id']; // Real company ID

// ✅ Get applications received for this company
$sql = "
    SELECT 
        a.id AS application_id,
        u.name AS student_name,
        u.email AS student_email,
        u.contact AS student_contact,
        i.title AS internship_title,
        a.status,
        a.applied_at
    FROM applications a
    JOIN internships i ON a.internship_id = i.id
    JOIN users u ON a.student_id = u.id
    WHERE a.company_id = $company_id
    ORDER BY a.applied_at DESC
";

$result = mysqli_query($db, $sql);
?>

<!-- ✅ Display Section -->
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="mb-4">Student Applications</h4>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Internship</th>
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['student_name']) ?></td>
                                    <td><?= htmlspecialchars($row['student_email']) ?></td>
                                    <td><?= htmlspecialchars($row['student_contact']) ?></td>
                                    <td><?= htmlspecialchars($row['internship_title']) ?></td>
                                    <td>
                                        <span class="badge 
                                            <?= $row['status'] === 'accepted' ? 'bg-success' :
                                               ($row['status'] === 'rejected' ? 'bg-danger' :
                                               ($row['status'] === 'withdrawn' ? 'bg-secondary' : 'bg-warning text-dark')) ?>">
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
                <div class="alert alert-info">No applications received yet.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("companyFooter.php"); ?>
