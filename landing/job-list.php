<?php
include('header.php');
?>

<!-- Page Header Start -->
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
<!-- Page Header End -->

<!-- Trainings Start -->
<div class="container py-5">
    <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Training Opportunities</h2>

    <div class="row g-4">
        <?php
        include('../dbms/connection.php');
        $query = "SELECT * FROM internships";
        $result = mysqli_query($db, $query);
        $delay = 0.2;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="<?= $delay ?>s">
                <div class="card h-100 border-0 training-card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-semibold text-dark"><?= $row["title"]; ?></h5>
                            <p class="card-text text-secondary small"><?= $row["description"]; ?></p>
                        </div>
                        <a href="login.php" class="btn btn-outline-dark w-100 mt-3">Apply Now</a>
                    </div>
                </div>
            </div>
        <?php
            $delay += 0.1;
        }
        ?>
    </div>
</div>
<!-- Trainings End -->

<!-- Styles: Elegant Grey Theme -->
<style>
    body {
        background-color: #f5f5f5;
    }

    .training-card {
        background-color: #f0f0f0;
        border-left: 5px solid #999;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
    }

    .training-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 18px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 18px;
        color: #2b2b2b;
    }

    .btn-outline-dark {
        border-color: #333;
        color: #333;
        font-weight: 500;
    }

    .btn-outline-dark:hover {
        background-color: #333;
        color: #fff;
    }
</style>

<!-- Animate.css and WOW.js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>

<?php
include('footer.php');
?>
