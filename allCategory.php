

<div class="container-xxl py-5" id="allCategories">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="section-title bg-white text-center text-primary px-3">All Users</h2>
        </div>
        <div class="row g-4 justify-content-center"><div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = mysqli_connect("localhost", "root", "", "allCategory");
                        $query = "SELECT * FROM `student_profiles`";

                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row["id"] ?></th>
                                <td><?php echo $row["user_id"] ?>
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
