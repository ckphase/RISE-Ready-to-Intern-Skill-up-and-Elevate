<?php
session_start(); // ✅ Always at the top

// Store company_id from URL into session once
if (isset($_GET['id'])) {
    $_SESSION['student_id'] = intval($_GET['id']);
}

// Now retrieve it
if (!isset($_SESSION['student_id'])) {
    // Redirect if ID is missing
    header("Location: companyLogin.php");
    exit();
}

$student_id = $_SESSION['student_id'];

include("studentheader.php");
include('../dbms/connection.php');

// Now you can safely use $company_id in your queries
?>
<!-- Breadcrumb Section -->
<div class="container-fluid text-white" style="
    background: rgba(109, 182, 209, 1);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top: 70px;
    padding-bottom: 70px;
">

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <?php
                $query = "SELECT * FROM `users` WHERE role = 'student' AND status = 'active' AND id = $student_id";
                $result = mysqli_query($db, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $StudentData = mysqli_fetch_assoc($result);
                    $companyName = $StudentData['name'];
                } else {
                    echo "<script>alert('Company not found or inactive.'); window.location.href='../login.php';</script>";
                    exit();
                }
                ?>
                <h2 class="fw-bold mb-1 text-camelcase text-black" style="letter-spacing: 1px;">Welcome, <span
                        class="text-black"><?php echo $companyName; ?></span></h2>
                <h4 class="mb-0 text-light">to the student dashboard</h4>
            </div>

        </div>
    </div>
</div>
<div class="container">

    <!-- Stats Cards -->
    <!-- Stats Cards -->
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
                                <h3 class="fw-bold mb-0"></h3>
                                <p class="text-muted mb-0">Total Students</p>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +12%</small>
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
                            <div class="flex-grow-1 ms-3">
                                <h3 class="fw-bold mb-0"></h3>
                                <p class="text-muted mb-0">Total Companies</p>
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
                                <h3 class="fw-bold mb-0"></h3>
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
                                <h3 class="fw-bold mb-0"></h3>
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
                                <i class="fas fa-plus me-2"></i>View New Opportunity
                            </button></a>
                        <a href="companyApproval.php"><button class="btn btn-gradient mb-2 w-100">
                                <i class="fas fa-eye me-2"></i>Check Applications Status
                            </button></a>
                        <a href="companyMessage.php"><button class="btn btn-gradient w-100">
                                <i class="fas fa-envelope me-2"></i>Edit
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.remove('active'));

        // Remove active class from all nav links
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => link.classList.remove('active'));

        // Show selected section
        document.getElementById(sectionId).classList.add('active');

        // Add active class to clicked link
        event.target.classList.add('active');
    }
</script>

<?php
include('studentfooter.php');
?>