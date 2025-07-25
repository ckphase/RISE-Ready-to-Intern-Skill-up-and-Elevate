<?php
session_start();

if (!isset($_SESSION['company_id'])) {
    header("Location: login.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("companyHeader.php");
include('../dbms/connection.php'); // defines $conn

// Fetch company details and approval status
$query = "SELECT company_name, approval_status FROM companies WHERE user_id = $company_id";
$result = mysqli_query($db, $query);

$status = "not_found"; // default fallback
$company_name = "";
$company_email = "";

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $company_name = $row['company_name'];
    $status = $row['approval_status'];
} else {
    echo "<div class='alert alert-danger text-center'>Company details not found.</div>";
}
?>

<!-- Header Banner -->
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
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Check Your Status</h2>
                <h4 class="mb-0 text-light">RISE Approval Status Page</h4>
            </div>
        </div>
    </div>
</div>

<!-- Status Message Section -->
<div class="container py-4">
    <?php if ($status === "pending"): ?>
        <div class="alert alert-warning text-center">
            <strong>Status:</strong> Your registration is <b>under review</b>. Please wait 5–6 business days.
        </div>
    <?php elseif ($status === "approved"): ?>
        <div class="alert alert-success text-center">
            <strong>Status:</strong> Your company registration is <b>approved</b>. Welcome aboard!
        </div>
    <?php elseif ($status === "rejected"): ?>
        <div class="alert alert-danger text-center">
            <strong>Status:</strong> Your registration was <b>rejected</b>. Please contact support.
        </div>
    <?php else: ?>
        <div class="alert alert-secondary text-center">
            <strong>Status:</strong> Not available.
        </div>
    <?php endif; ?>
</div>

<!-- Timeline Section -->
<section class="bsb-timeline-1 py-xl-5" style="text-align: justify;">
    <div class="container">
        <div class="row gap-5">
            <div class="col-6 pe-5">
                <div class="row justify-content-start">
                    <h3 class="mb-4">Track Your Status</h3>
                </div>
                <p>This timeline shows the stages from registration to final approval of your company profile.</p>
                <div class="row py-5">
                    <div class="col-md-6 mb-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                                <h6>Application Submitted</h6>
                                <small class="text-muted">Dec 15, 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card 
                            <?php 
                            echo $status === 'pending' ? 'bg-warning text-white' : 
                                 ($status === 'approved' ? 'bg-success text-white' : 
                                 ($status === 'rejected' ? 'bg-danger text-white' : 'bg-light')); 
                            ?>">
                            <div class="card-body">
                                <i class="fas fa-eye fa-2x mb-2"></i>
                                <h6>
                                    <?php
                                        if ($status === 'pending') echo 'Under Review';
                                        elseif ($status === 'approved') echo 'Approved';
                                        elseif ($status === 'rejected') echo 'Rejected';
                                        else echo 'Unknown';
                                    ?>
                                </h6>
                                <small>Current Status</small>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Status updates typically take 5–6 business days after submission. If delayed, contact support.</p>
                <h5 class="pt-3">Need Help?</h5>
                <p>If your approval process is taking longer, feel free to reach out to our support team.</p>
            </div>

            <div class="col">
                <ul class="timeline">
                    <li class="timeline-item">
                        <div class="timeline-body">
                            <div class="timeline-content">
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <h5 class="card-subtitle text-secondary mb-1">Step 1</h5>
                                        <h2 class="card-title mb-3">Registration</h2>
                                        <p>Submit basic company details like name, email, and industry.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-body">
                            <div class="timeline-content">
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <h5 class="card-subtitle text-secondary mb-1">Step 2</h5>
                                        <h2 class="card-title mb-3">We’re Reviewing</h2>
                                        <p>Our team reviews your submitted info and verifies your company.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-body">
                            <div class="timeline-content">
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <h5 class="card-subtitle text-secondary mb-1">Step 3</h5>
                                        <h2 class="card-title mb-3">You’re In! Welcome Aboard</h2>
                                        <p>Once approved, you can start using all the features on the platform.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include("companyFooter.php"); ?>
