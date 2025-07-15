<?php include('adminHeader.php'); ?>
<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Account Management</h2>
                <p class="text-muted">Manage student and company accounts</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">

                <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-info text-center">
                        <?php echo htmlspecialchars($_GET['msg']); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
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
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["contact"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td>
                                    <a href="accountManagementactive.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                    <a href="accountManagementdeactive.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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
<?php include('adminFooter.php'); ?>
