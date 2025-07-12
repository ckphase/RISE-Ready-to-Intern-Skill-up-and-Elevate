<?php
include('adminHeader.php');
?>
<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Reports</h2>
                <p class="text-muted">Reports, reveiws and suggestions by users.</p>
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
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('connection.php');
                        $query = "SELECT * FROM `reports`";

                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["name"] ?>
                                </td>
                                <td><?php echo $row["email"] ?>
                                </td>
                                <td style="width: 150px;"><?php echo $row["subject"] ?>
                                </td>
                                <td style="width: 200px"><?php echo $row["message"] ?>
                                </td>
                                <td><?php echo $row["created at"] ?>
                                </td>
                               
                                <td>
                                    <!-- deletee  -->
                                    <button class="btn btn-success btn-sm me-1">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-white"><i
                                                class="fas fa-check"></i></a>
                                    </button>
                                    <button class="btn btn-danger btn-sm me-1">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-white"><i
                                                class="fas fa-times"></i></a>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <a href="deletee.php?id=<?php echo $row["id"] ?>" class="text-primary"><i
                                                class="fas fa-eye"></i></a>
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