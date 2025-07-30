<?php
include('header.php');
?>
<!-- Header End -->
<div class="container-xxl bg-dark page-header mb-5" style="padding-left: 60px; background: url('../img/landing-2.avif') no-repeat center center fixed;background-size: cover;">
    <div class="my-5 pt-5 pb-4">
        <h1 class="display-5 fw-bold">Category</h1>
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


<!-- Category Start -->
<div class="container-xxl py-5">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>

    <div class="container d-flex justify-content-evenly flex-wrap">
        <?php
        include('../dbms/connection.php');
        $query = "SELECT * FROM internships";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc(($result))) {
            ?>
            <div class="card d-flex justify-content-center my-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["title"] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $row["location"] ?></h6>
                    <p class="card-text"><?php echo $row["description"] ?></p>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- Category End -->
<?php
include('footer.php');
?>