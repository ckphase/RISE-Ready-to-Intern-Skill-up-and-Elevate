<?php
include('adminHeader.php');
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
                            <th scope="col">ID</th>
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
                        $db = mysqli_connect("localhost", "root", "", "rise3");
                        $query = "SELECT * FROM `internships`";

                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["title"] ?>
                                </td>
                                <td><?php echo $row["location"] ?>
                                </td>
                                <td><?php echo $row["duration"] ?>
                                </td>
                                <td><?php echo $row["stipend"] ?>
                                </td>
                                <td><?php echo $row["last_date"] ?>
                                </td>
                                <td><?php echo $row["status"] ?>
                                </td>
                                <td>
                                    <!-- deletee  -->
                                    <button class="btn btn-success btn-sm me-1">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-white"><i class="fas fa-check"></i></a>
                                    </button>
                                    <button class="btn btn-danger btn-sm me-1">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-white"><i class="fas fa-times"></i></a>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-primary"><i class="fas fa-eye"></i></a>
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