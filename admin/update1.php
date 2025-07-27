<?php
include("adminHeader.php");
?>



<!-- All Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">All Category Page</h6>

        </div>
        <div class="row g-4 justify-content-center">


            <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>



                        <?php
                        include('../dbms/connection.php');
                        $query = "SELECT * FROM `companies`";

                        $result = mysqli_query($db, $query);

                        // print_r($result);
                        // print_r(mysqli_fetch_assoc($result));

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    
                                
                                    <?php echo $row["name"] ?>
                                </td>
                                <td>
                                     <?php echo $row["status"] ?>
                                </td>

                                <td>
                                    <button>
                                    
                                    <button>
                                    <a href="deleteCategory.php?id=<?php echo $row["id"] ?>"> Delete</a>
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
<!-- All Category End -->



<?php
include("adminFooter.php");

?>