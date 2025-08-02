<?php include('header.php'); ?>

<!-- Page Header -->
<div class="container-xxl bg-dark page-header mb-5" style="padding-left: 60px; background: url('../img/landing-2.avif') no-repeat center center fixed; background-size: cover;">
    <div class="my-5 pt-5 pb-4 text-white">
        <h1 class="display-5 fw-bold animated fadeInDown">Industrial Trainings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Internships Section -->
<div class="container py-5">
    <h2 class="text-center mb-5 wow fadeInUp">Available Internships</h2>

    <div class="internship-list">
        <?php
        include('../dbms/connection.php');
        $query = "SELECT * FROM internships";
        $result = mysqli_query($db, $query);
        $delay = 0.1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="internship-item wow fadeInUp" data-wow-delay="<?= $delay ?>s">
                <div class="internship-content">
                    <div class="internship-left">
                        <div class="internship-label">INTERNSHIP</div>
                        <h5 class="internship-title"><?= $row["title"]; ?></h5>
                        <p class="internship-desc"><?= $row["description"]; ?></p>
                    </div>
                    <div class="internship-right">
                        <a href="login.php" class="internship-apply">Apply Now</a>
                    </div>
                </div>
            </div>
        <?php $delay += 0.1; } ?>
    </div>
</div>

<!-- Animate.css and WOW.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>

<?php include('footer.php'); ?>
