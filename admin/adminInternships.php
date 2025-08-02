<?php
include('adminHeader.php');
include('../dbms/connection.php');
?>

<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Internship Management</h2>
                <p class="text-muted">Manage and monitor internship listings</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Internship Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Last Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `internships`";
                        $result = mysqli_query($db, $query);
                        $i = 1;

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $internshipId = $row['id']; // Adjust if column is different
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td><?php echo htmlspecialchars($row["title"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["location"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["duration"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["stipend"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["last_date"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["status"]); ?></td>
                                    <td>
                                        <!-- Activate -->
                                        <a href="updateStatusUsers.php?id=<?php echo $internshipId; ?>&status=open"
                                           class="btn btn-success btn-sm me-1" title="Set Status to Open">
                                            <i class="fas fa-check"></i>
                                        </a>

                                        <!-- Deactivate -->
                                        <a href="updateStatusUsers.php?id=<?php echo $internshipId; ?>&status=closed"
                                           class="btn btn-danger btn-sm me-1" title="Set Status to Closed">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="8" class="text-center text-muted">No internships found.</td></tr>';
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
