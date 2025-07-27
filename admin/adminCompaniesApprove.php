<?php
include('adminHeader.php');
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
<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Company Approval</h2>
                <p class="text-muted">Review and approve company registrations</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
             <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Pending Company Approvals</h5>
                </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Owner</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../dbms/connection.php');
                        $query = "SELECT * FROM `users` WHERE `role` = 'company' AND `status` = 'inactive'";

                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["name"] ?>
                                </td>
                                <td><?php echo $row["email"] ?>
                                </td>
                                <td><?php echo $row["contact"] ?>
                                </td>
                                <td><?php echo $row["role"] ?>
                                </td>
                                <td><?php echo $row["created_at"] ?>
                                </td>
                                <td><?php echo $row["status"] ?>
                                </td>
                                <td>
                                    <!-- deletee  -->
                                   <button class="btn btn-success btn-sm me-1">
                                        <a href="insertCompany.php?id=<?php echo $row["id"] ?>" class="text-white">Accept</a>
                                    </button>
                                    <button class="btn btn-danger btn-sm me-1">
                                        <a href="deleteCompany.php?id=<?php echo $row["id"] ?>" class="text-white">Reject</i></a>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <a href="update.php?id=<?php echo $row["id"] ?>" class="text-primary">View</a>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
                <div class="row g-4 justify-content-center">
             <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Approved Companies</h5>
                </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Owner</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        $query = "SELECT * FROM `users` WHERE `role` = 'company' AND `status` = 'active'";

                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["name"] ?>
                                </td>
                                <td><?php echo $row["email"] ?>
                                </td>
                                <td><?php echo $row["contact"] ?>
                                </td>
                                <td><?php echo $row["role"] ?>
                                </td>
                                <td><?php echo $row["created_at"] ?>
                                </td>
                                <td><?php echo $row["status"] ?>
                                </td>
                                <td>
                                    <!-- deletee  -->
                                    <button class="btn btn-success btn-sm me-1">
                                        <a href="insertCompany.php?id=<?php echo $row["id"] ?>" class="text-white">Accept</a>
                                    </button>
                                    <button class="btn btn-danger btn-sm me-1">
                                        <a href="deleteCompany.php?id=<?php echo $row["id"] ?>" class="text-white">Reject</a>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <a href="update.php?id=<?php echo $row["id"] ?>" class="text-primary">View</a>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include('adminFooter.php');
?>
