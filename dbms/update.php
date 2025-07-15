<?php
include("adminHeader.php");
include("connection.php");

$urlId = $_GET["id"];
$query = "SELECT * FROM `users` WHERE `id` = '$urlId' AND `role` = 'company'";
$result = mysqli_query($db, $query);
$userData = mysqli_fetch_assoc($result);
?>

<!-- Company Update Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Update Company</h6>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $userData['name']; ?>">
                                <label for="name">Owner Name</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $userData['email']; ?>">
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="<?php echo $userData['contact']; ?>">
                                <label for="contact">Contact Number</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select" name="status" id="status">
                                    <option value="active" <?php if($userData['status'] == 'active') echo 'selected'; ?>>Active</option>
                                    <option value="inactive" <?php if($userData['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="submit_button">Update Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Company Update Form End -->

<?php
if (isset($_POST["submit_button"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $status = $_POST["status"];

    $query = "UPDATE `users` SET 
                `name` = '$name',
                `email` = '$email',
                `contact` = '$contact',
                `status` = '$status'
              WHERE `id` = '$urlId' AND `role` = 'company'";

    $result = mysqli_query($db, $query);

    if ($result == 1) {
        echo "<script> window.location.assign('adminCompaniesApprove.php?msg=Company Updated Successfully!') </script>";
    } else {
        echo "<div class='text-center text-danger fw-bold'>Failed to Update Company!</div>";
    }
}
?>

<?php include("adminFooter.php"); ?>
