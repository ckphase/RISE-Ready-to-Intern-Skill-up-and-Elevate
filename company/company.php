<?php
session_start(); // ✅ Always at the top

// Store company_id from URL into session once
if (isset($_GET['id'])) {
    $_SESSION['company_id'] = intval($_GET['id']);
}

// Now retrieve it
if (!isset($_SESSION['company_id'])) {
    // Redirect if ID is missing
    header("Location: companyLogin.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("companyHeader.php");
include('../dbms/connection.php');

// Now you can safely use $company_id in your queries
?>



<div class="container-fluid text-white" style="
    background: rgba(136, 211, 238, 1);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top:70px;
    padding-bottom:70px;
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
                <h2 class="fw-bold mb-1 text-uppercase text-black text-border" style="letter-spacing: 1px;">Welcome,
                    <?php echo $companyName; ?>
                </h2>
                <h4 class="mb-0 text-light">Company Dashboard</h4>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="container">
    <div class="row g-4 mt-3 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-3 shadow-sm h-100">
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
            <div class="card border-3 shadow-sm h-100">
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
            <div class="card border-3 shadow-sm h-100">
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
            <div class="card border-3 shadow-sm h-100">
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
            <div class="card border-3">
                <div class="card-header">
                    <h5><i class="fas fa-chart-line me-2"></i>Recent Trainings</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <?php
                            include('../dbms/connection.php');
                            $query = "SELECT i.*, c.id AS company_name 
                            FROM internships i
                            INNER JOIN companies c ON i.company_id = c.id
                            WHERE c.user_id = $user_id";
                            $result = mysqli_query($db, $query);
                            $sno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $sno ?></td>
                                    <td><?php echo $row["title"] ?></td>
                                    <td><?php echo $row["duration"] ?></td>
                                    <td><?php echo $row["last_date"] ?></td>
                                    <td><?php echo $row["status"] ?></td>
                                </tr>
                                <?php
                                $sno++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-3">
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