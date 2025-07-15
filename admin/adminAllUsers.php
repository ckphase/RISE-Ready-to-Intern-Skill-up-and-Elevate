<!-- Accounts Section -->
            <!-- <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-dark">Account Management</h2>
                    <p class="text-muted">Manage student and company accounts</p>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search accounts...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Types</option>
                        <option>Students</option>
                        <option>Companies</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Suspended</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-plus"></i> Add Account
                    </button>
                </div>
            </div>
             -->
<?php
include('adminHeader.php');
?>
<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Accounts List</h2>
                <p class="text-muted">Manage student and company accounts</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       include('../dbms/connection.php');
                        $query = "SELECT * FROM `users`";

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
                                <td><?php echo $row["status"] ?>
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