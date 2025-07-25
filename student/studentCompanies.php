<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: studentLogin.php");
    exit();
}

include("studentheader.php");
include('../dbms/connection.php');

// Handle flash message (after applying)
if (isset($_SESSION['msg'])) {
    echo "<div class='alert alert-info text-center'>".$_SESSION['msg']."</div>";
    unset($_SESSION['msg']);
}

// Fetch all open internships
$sql = "SELECT * FROM internships WHERE status = 'open' ORDER BY created_at DESC";
$result = mysqli_query($db, $sql);
?>

<!-- Bootstrap Container -->
<div class="container my-5">
    <h2 class="mb-4">Available Internships</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)):
                $id = $row['id'];
            ?>
                <!-- Internship Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fas fa-briefcase me-2"></i> <?= htmlspecialchars($row['title']) ?>
                            </h5>
                            <p class="card-text">
                                <strong>Location:</strong> <?= htmlspecialchars($row['location']) ?><br>
                                <strong>Duration:</strong> <?= htmlspecialchars($row['duration']) ?><br>
                                <strong>Stipend:</strong> <?= htmlspecialchars($row['stipend']) ?><br>
                                <strong>Apply By:</strong> <?= date("d M Y", strtotime($row['last_date'])) ?>
                            </p>
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal with Apply Form -->
                <div class="modal fade" id="modal<?= $id ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalLabel<?= $id ?>"><?= htmlspecialchars($row['title']) ?></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                                <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                                <p><strong>Duration:</strong> <?= htmlspecialchars($row['duration']) ?></p>
                                <p><strong>Stipend:</strong> <?= htmlspecialchars($row['stipend']) ?></p>
                                <p><strong>Last Date:</strong> <?= date("d M Y", strtotime($row['last_date'])) ?></p>
                            </div>
                            <form action="applyInternship.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $_SESSION['student_id'] ?>">
                                <input type="hidden" name="internship_id" value="<?= $id ?>">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success w-50">Apply</button>
                                    <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">No internships available at the moment.</div>
    <?php endif; ?>
</div>

<?php include('studentfooter.php'); ?>
