<?php
include('header.php');
?>
<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Industrial Training</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Industrial Training Listings</h1>

        <?php
        include('../dbms/connection.php');
        $query = "SELECT * FROM internships";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card my-4">
                <div class="card-header">
                   <?php echo $row["title"]?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["title"]?></h5>
                    <p class="card-text"><?php echo $row["description"]?></p>
                    <a href="#" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- Jobs End -->
<?php
include('footer.php');
?>