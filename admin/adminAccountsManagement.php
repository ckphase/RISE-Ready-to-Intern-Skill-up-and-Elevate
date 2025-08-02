<?php
// Start session and include DB connection and header
session_start();
include('adminHeader.php');
include('../dbms/connection.php');
?>

<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Account Management</h2>
                <p class="text-muted">Manage student and company accounts</p>
            </div>
        </div>

        <!-- Display Status Message -->
        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-info text-center">
                <?php echo htmlspecialchars($_GET['msg']); ?>
            </div>
        <?php endif; ?>

        <!-- Table of Users -->
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-info">
                            <tr>
                                <th>#</th>
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
                            // Fetch all users
                            $query = "SELECT * FROM `users` ORDER BY id ASC";
                            $result = mysqli_query($db, $query);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)):
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["contact"]); ?></td>
                                    <td><?php echo ucfirst($row["role"]); ?></td>
                                    <td>
                                        <span
                                            class="badge bg-<?php echo $row["status"] === 'active' ? 'success' : 'secondary'; ?>">
                                            <?php echo ucfirst($row["status"]); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="updateStatusUsers.php?id=<?php echo $row['id']; ?>&status=active"
   class="btn btn-success btn-sm"
   title="Activate Account"
   onclick="return confirm('Are you sure you want to activate this account?');">
   <i class="fas fa-check"></i>
</a>

<a href="updateStatusUsers.php?id=<?php echo $row['id']; ?>&status=inactive"
   class="btn btn-danger btn-sm"
   title="Deactivate Account"
   onclick="return confirm('Are you sure you want to deactivate this account?');">
   <i class="fas fa-times"></i>
</a>

                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('adminFooter.php'); ?>