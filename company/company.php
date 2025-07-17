<?php
include("companyHeader.php");
include('../dbms/connection.php');

session_start();

$company_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Optional: Store in session
$_SESSION['company_id'] = $company_id;
?>



<div class="container-fluid text-white" style="
    background-image: url('https://plus.unsplash.com/premium_photo-1661776946043-cd5b2190a616?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top: 120px;
    padding-bottom: 120px;
">
    <?php
    $query = "SELECT * FROM `users` WHERE role = 'company' AND status = 'active' AND id = $company_id";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $companyData = mysqli_fetch_assoc($result);

        // Example values
        $companyName = $companyData['name'];
        $status = $companyData['status'];
        $email = $companyData['email'];
        // Add more fields as needed
    } else {
        echo "<script>alert('Company not found or inactive.'); window.location.href='../login.php';</script>";
        exit();
    }
    ?>

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold mb-1 text-uppercase text-black text-border" style="letter-spacing: 1px;">
                    <?php echo $companyName; ?>
                </h1>
                <p class="mb-0 small text-light">Find your industrial trainings!!</p>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="container">
    <div class="row g-4 mt-3 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo ucfirst($status); ?></h3>
                            <p class="text-muted mb-0"><?php echo $companyName; ?></p>
                            <small class="text-success"><i class="fas fa-circle"
                                    style="font-size: 8px;vertical-align: middle;top: -1px;"></i> Status</small>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-building fs-4"></i>
                            </div>
                        </div>
                        <?php

                        $user_id = $_SESSION['company_id']; // Assuming this is already set
                        
                        // Count total internships created by user's companies
                        $totalQuery = "
                            SELECT COUNT(*) AS total 
                            FROM internships i
                            INNER JOIN companies c ON i.company_id = c.id
                            WHERE c.user_id = $user_id
                        ";
                        $totalResult = mysqli_query($db, $totalQuery);
                        $totalRow = mysqli_fetch_assoc($totalResult);
                        $totalInternships = $totalRow['total'];

                        // Count only active (open) internships
                        $activeQuery = "
                            SELECT COUNT(*) AS active 
                            FROM internships i
                            INNER JOIN companies c ON i.company_id = c.id
                            WHERE c.user_id = $user_id AND i.status = 'open'
                        ";
                        $activeResult = mysqli_query($db, $activeQuery);
                        $activeRow = mysqli_fetch_assoc($activeResult);
                        $activeInternships = $activeRow['active'];
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalInternships ?></h3>
                            <p class="text-muted mb-0">Total Interships</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +5%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <div class="bg-warning text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-briefcase fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $activeInternships ?></h3>
                            <p class="text-muted mb-0">Active Internships</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i>20</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-file-alt fs-4"></i>
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0">0</h3>
                            <p class="text-muted mb-0">Applications Today</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +23%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-chart-line me-2"></i>Recent Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-user text-success me-2"></i>New application from John Doe
                        </li>
                        <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Internship posted
                            successfully</li>
                        <li class="mb-3"><i class="fas fa-envelope text-info me-2"></i>Message sent to 3 candidates
                        </li>
                        <li class="mb-3"><i class="fas fa-star text-warning me-2"></i>Profile updated</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-bullhorn me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <a href="companyOpportunities.php"><button class="btn btn-gradient mb-2 w-100">
                        <i class="fas fa-plus me-2"></i>Post New Opportunity
                    </button></a>
                    <a href="companyApproval.php"><button class="btn btn-gradient mb-2 w-100">
                        <i class="fas fa-eye me-2"></i>Review Applications
                    </button></a>
                    <a href="companyMessage.php"><button class="btn btn-gradient w-100">
                        <i class="fas fa-envelope me-2"></i>Contact Students
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<?php
include("companyFooter.php");
?>