<?php include('adminHeader.php'); ?>
<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Accounts List</h2>
                <p class="text-muted">Manage student and company accounts</p>
            </div>
        </div>

        <!-- Announcement Form -->
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card-body bg-light p-4 rounded shadow-sm">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter announcement title" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Recipients</label>
                                <select class="form-select" name="target_role" required>
                                    <option value="All Users">All Users</option>
                                    <option value="Students">Students Only</option>
                                    <option value="Companies">Companies Only</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Priority</label>
                                <select class="form-select" name="priority" required>
                                    <option value="Normal">Normal</option>
                                    <option value="High">High</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="5" placeholder="Enter your announcement message" required></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Send Announcement
                            </button>
                        </div>
                    </form>

                    <?php
                    include('connection.php');
                    if (isset($_POST['submit'])) {
                        $title = mysqli_real_escape_string($db, $_POST['title']);
                        $message = mysqli_real_escape_string($db, $_POST['message']);
                        $target = $_POST['target_role'];
                        $priority = $_POST['priority'];

                        $query = "INSERT INTO announcements (title, message, target_role, priority) 
                                  VALUES ('$title', '$message', '$target', '$priority')";

                        if (mysqli_query($db, $query)) {
                            echo "<script>alert('Announcement sent successfully!');</script>";
                        } else {
                            echo "<script>alert('Error sending announcement.');</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Recent Announcements Table -->
        <div class="col mt-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="card-title mb-0">Recent Announcements</h5>
                </div>
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <table class="table table-striped table-hover">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Message</th>
                                <th scope="col">Target</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `announcements` ORDER BY created_at DESC";
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <th scope='row'>{$row["id"]}</th>
                                    <td>{$row["title"]}</td>
                                    <td>{$row["message"]}</td>
                                    <td>{$row["target_role"]}</td>
                                    <td>{$row["created_at"]}</td>
                                    <td>{$row["priority"]}</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('adminFooter.php'); ?>
