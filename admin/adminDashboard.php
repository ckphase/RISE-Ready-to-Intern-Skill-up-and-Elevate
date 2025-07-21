<?php
include('adminheader.php');
include('../dbms/connection.php');
?>
<?php
// Check if 'id' is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "Select * from `users` where id = '$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $id = $row["id"];
    $name = $row["name"];
} else {
    echo "No user ID provided.";
}
?>
<!-- Professional Admin Header with Background Image -->
<div class="container-fluid text-white px-4 mb-5" style="
        padding-top: 70px;
        padding-bottom: 70px;
        background: rgb(157,168,172);
                    url('https://images.unsplash.com/photo-1605902711622-cfb43c4437d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
        background-size: cover;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    ">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-uppercase" style="letter-spacing: 1px;">Welcome,
                    <?php echo htmlspecialchars($name); ?>
                </h2>
                <h4 class="mb-0 text-light">to the admin dashboard</h4>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container-fluid mt-4">

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-3 shadow-sm h-100">
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
                        $queryTotal = "SELECT COUNT(*) AS student 
                        FROM `users` 
                        WHERE role = 'student' 
                        AND MONTH(created_at) = MONTH(CURRENT_DATE()) 
                        AND YEAR(created_at) = YEAR(CURRENT_DATE())";
                        $result = mysqli_query($db, $queryTotal);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalStudents; ?></h3>
                            <p class="text-muted mb-0">Total Students</p>
                            <small class="text-success d-flex align-items-center">
                                <i class="fas fa-arrow-up me-1"></i>
                                <span class="fw-semibold">+<?php echo $row['student']; ?></span>
                            </small>
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
                        $query = "SELECT COUNT(*) as company FROM `companies`";
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalCompanies = $data['company'];
                        $queryTotalCompany = "SELECT COUNT(*) AS company 
                        FROM `users` 
                        WHERE role = 'company' 
                        AND MONTH(created_at) = MONTH(CURRENT_DATE()) 
                        AND YEAR(created_at) = YEAR(CURRENT_DATE())";
                        $result = mysqli_query($db, $queryTotalCompany);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalCompanies ?></h3>
                            <p class="text-muted mb-0">Total Companies</p>
                            <small class="text-success"><i
                                    class="fas fa-arrow-up"></i><?php echo " +" . $row['company']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-3 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <?php
                        $query = "SELECT COUNT(*) as internship FROM `internships`";
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalInternships = $data['internship'];
                        $queryTotalInternships = "SELECT COUNT(*) AS title 
                        FROM `internships`
                        WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) 
                        AND YEAR(created_at) = YEAR(CURRENT_DATE())";
                        $result = mysqli_query($db, $queryTotalInternships);
                        $row = mysqli_fetch_assoc($result);

                        ?>
                        <div class="flex-shrink-0">
                            <div class="bg-warning text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-briefcase fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalInternships ?></h3>
                            <p class="text-muted mb-0">Active Internships</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i><?php echo " +" . $row['title'];?></small>
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
                        <?php
                        $query = 'SELECT COUNT(*) as application FROM `applications` WHERE status = "pending"';
                        $result = mysqli_query($db, $query);
                        $data = mysqli_fetch_assoc($result);
                        $totalPeople = $data['application'];
                        $queryTotalApplications = "SELECT COUNT(*) AS applications 
                        FROM `applications`
                        WHERE MONTH(applied_at) = MONTH(CURRENT_DATE()) 
                        AND YEAR(applied_at) = YEAR(CURRENT_DATE())";
                        $result = mysqli_query($db, $queryTotalApplications);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"><?php echo $totalPeople ?></h3>
                            <p class="text-muted mb-0">Applications Today</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i><?php echo " +" . $row['applications'];?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-3 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Companies For Approval</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 pt-0">
                            <div class="d-flex align-items-center pt-0">
                                <table class="table">
                                    <tbody>
                                        <?php
                                        include('../dbms/connection.php');
                                        $query = "SELECT * FROM `users` WHERE `role` = 'company' AND `status` = 'inactive'";

                                        $result = mysqli_query($db, $query);
                                        $sno = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                            <tr>
                                                <td scope="row"><?php echo $sno ?></td>
                                                <td><?php echo $row["name"] ?></td>
                                                <td><?php echo $row["email"] ?></td>
                                                <td><?php echo $row["contact"] ?></td>
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