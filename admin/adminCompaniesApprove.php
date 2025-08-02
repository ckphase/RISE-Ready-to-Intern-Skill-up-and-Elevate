<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: companyLogin.php"); // Or adminLogin.php if this is admin side
    exit();
}
$admin_id = $_SESSION['id'];

include('adminHeader.php');
include('../dbms/connection.php');

// Optional: Get Admin Name
$query = "SELECT name FROM `users` WHERE id = '$admin_id'";
$result = mysqli_query($db, $query);
$adminName = ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result)['name'] : "Admin";
?>

<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Company Approval</h2>
                <p class="text-muted">Review and approve company registrations</p>
            </div>
        </div>

        <!-- Pending Companies -->
        <div class="row g-4 justify-content-center">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0">Pending Company Approvals</h5>
            </div>
            <div class="col-lg-12 col-md-12">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Owner</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `users` WHERE `role` = 'company' AND `status` = 'inactive'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["contact"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td>
                                    <a href="insertCompany.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm me-1">Accept</a>
                                    <a href="deleteCompany.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm me-1">Reject</a>
                                    <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-primary btn-sm">View</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Approved Companies -->
        <div class="row g-4 justify-content-center mt-5">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0">Approved Companies</h5>
            </div>
            <div class="col-lg-12 col-md-12">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Owner</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `users` WHERE `role` = 'company' AND `status` = 'active'";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["contact"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td>
                                    <a href="insertCompany.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm me-1">Accept</a>
                                    <a href="deleteCompany.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm me-1">Reject</a>
                                    <a href="update.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-primary btn-sm">View</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('adminFooter.php'); ?>
