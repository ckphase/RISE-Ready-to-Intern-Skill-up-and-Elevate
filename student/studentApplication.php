<?php
session_start();
include('studentheader.php');
include('../dbms/connection.php');

if (!isset($_SESSION['student_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$profile = [];
$user = [];

// Fetch user (from users table)
$userQuery = "SELECT * FROM users WHERE id = $student_id";
$userResult = mysqli_query($db, $userQuery);
if ($userResult && mysqli_num_rows($userResult) > 0) {
    $user = mysqli_fetch_assoc($userResult);
}

// Fetch profile (from student_profiles)
$profileQuery = "SELECT * FROM students WHERE user_id = $student_id";
$profileResult = mysqli_query($db, $profileQuery);
if ($profileResult && mysqli_num_rows($profileResult) > 0) {
    $profile = mysqli_fetch_assoc($profileResult);
}
?>

<div class="container-fluid text-white" style="
    background: rgba(136, 211, 238, 1);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top:40px;
    padding-bottom:40px;
">

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Your Profile and Details
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Profile Page</h4>
            </div>
        </div>
    </div>
</div>
<!-- Applications Section -->
<div id="applications">
    <div class="container-xxl py-4">
        <h2 class="mb-4">My Applications</h2>

        <?php
        $query = "
            SELECT a.*, i.title AS internship_title, i.created_at, c.company_name AS company_name
            FROM applications a
            JOIN internships i ON a.internship_id = i.id
            JOIN companies c ON i.company_id = c.id
            WHERE a.student_id = $student_id
            ORDER BY a.applied_at DESC
        ";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
                $statusClass = match ($row['status']) {
                    'applied' => 'bg-secondary',
                    'under_review' => 'bg-warning',
                    'interview' => 'bg-info',
                    'offer' => 'bg-success',
                    'rejected' => 'bg-danger',
                    default => 'bg-light text-dark'
                };
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="card-title mb-1"><?= htmlspecialchars($row['internship_title']) ?></h5>
                                <p class="text-muted mb-1"><strong><?= htmlspecialchars($row['company_name']) ?></strong></p>
                                <small class="text-muted">
                                    Applied: <?= date("F d, Y", strtotime($row['applied_at'])) ?> |
                                    Application ID: #APP<?= str_pad($row['id'], 3, '0', STR_PAD_LEFT) ?>
                                </small>
                            </div>
                            <div class="col-md-4 text-end">
                                <span class="badge <?= $statusClass ?> fs-6 mb-2 d-block">
                                    <?= ucwords(str_replace('_', ' ', $row['status'])) ?>
                                </span>
                                <?php if (in_array($row['status'], ['applied', 'under_review'])): ?>
                                    <form method="POST" action="withdrawApplication.php"
                                        onsubmit="return confirm('Are you sure you want to withdraw this application?');">
                                        <input type="hidden" name="application_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                   Withdraw
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; else: ?>
            <div class="alert alert-warning text-center">You haven't applied to any internships yet.</div>
        <?php endif; ?>
    </div>
</div>

<?php
include('studentfooter.php');
?>