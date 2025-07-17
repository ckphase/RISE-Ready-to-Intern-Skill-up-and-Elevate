<?php
include('adminheader.php');
include('../dbms/connection.php');
?>
<?php
// Check if 'id' is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "User ID: " . htmlspecialchars($id);
} else {
    echo "No user ID provided.";
}
?>
<!-- Professional Admin Header with Background Image -->
<div class="container-fluid text-white py-5 px-4 mb-5" style="
        background: rgb(157,168,172);
                    url('https://images.unsplash.com/photo-1605902711622-cfb43c4437d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
        background-size: cover;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    ">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-uppercase" style="letter-spacing: 1px;">Admin Dashboard </h2>
                <p class="mb-0 small text-light">Full control over users, companies, and internships</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container-fluid mt-4">

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users fs-4"></i>
                            </div>
                        </div>
                        <?php
                        $query = "SELECT COUNT(*) as student FROM `users` WHERE role = 'student'";
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalStudents = $data['student'];
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalStudents; ?></h3>
                            <p class="text-muted mb-0">Total Students</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +12%</small>
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
                        $query = "SELECT COUNT(*) as company FROM `companies`";
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalCompanies = $data['company'];
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalCompanies ?></h3>
                            <p class="text-muted mb-0">Total Companies</p>
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
                        <?php
                        $query = "SELECT COUNT(*) as internship FROM `internships`";
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalInternships = $data['internship'];
                        // $internshipsPercent = "SELECT COUNT(*) as internship FROM `internships` where status = 'open'";
                        // $resultPercent = mysqli_query($db, $internshipsPercent);
                            ?>
                        <div class="flex-shrink-0">
                            <div class="bg-warning text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-briefcase fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalInternships ?></h3>
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
                        <?php
                        $query = 'SELECT COUNT(*) as application FROM `applications` WHERE status = "pending"';
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalPeople = $data['application'];
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalPeople ?></h3>
                            <p class="text-muted mb-0">Applications Today</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +23%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Recent Activities</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle p-2 me-3">
                                    <i class="fas fa-building text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New company registration</h6>
                                    <p class="mb-0 text-muted small">TechCorp Inc. submitted registration</p>
                                </div>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-success rounded-circle p-2 me-3">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Company approved</h6>
                                    <p class="mb-0 text-muted small">InnovateNow has been approved</p>
                                </div>
                                <small class="text-muted">5 hours ago</small>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded-circle p-2 me-3">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New student registration</h6>
                                    <p class="mb-0 text-muted small">John Doe created an account</p>
                                </div>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 d-grid gap-4">
            <a href="adminCompaniesApprove.php" class="btn btn-primary pt-2 pb-0">
                <i class="fas fa-building me-2"></i>Review Companies
            </a>
            <a href="adminAnnouncements.php" class="btn btn-success">
                <i class="fas fa-bullhorn me-2"></i>Send Announcement
            </a>
            <a href="adminCompaniesApprove.php" class="btn btn-info">
                <i class="fas fa-file-alt me-2"></i>Review Applications
            </a>
            <a href="adminAnnouncements.php" class="btn btn-warning text-white">
                <i class="fas fa-briefcase me-2"></i>Manage Internships
            </a>
        </div>

    </div>
</div>
</div>

<!-- Bootstrap 5 JS -->



<?php

include('adminfooter.php');

?>