<?php include('header.php'); ?>
<!-- Header End -->

<!-- Hero Section -->
<div class="container-xxl bg-dark page-header mb-0" style="padding-top: 80px; padding-left: 60px; background: url('../img/landing-2.avif') no-repeat center center fixed; background-size: cover;">
    <div class="text-white py-5">
        <h1 class="display-5 fw-bold animated fadeInDown mb-2">Industrial Trainings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Category Cards -->
<div class="container-xxl pt-5 pb-2" style="background-color: #f5f5f5;">
    <h2 class="text-center mb-4 text-secondary fw-light" style="letter-spacing: 1px;">Explore Opportunities by Category</h2>
    <div class="row justify-content-center px-5"> <!-- padding added here -->
        <?php
        include('../dbms/connection.php');
        $query = "SELECT DISTINCT title, location, description FROM internships";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4 mb-4"> <!-- 3 columns per row on medium+ screens -->
                <div class="card border-2 shadow-sm rounded-4 h-100" style="background-color: #f0f0f0; transition: all 0.3s ease;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="icon text-center mb-3">
                            <i class="fas fa-briefcase fa-lg text-secondary"></i>
                        </div>
                        <h5 class="fw-semibold text-dark text-center mb-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo $row["title"]; ?>
                        </h5>
                        <h6 class="text-muted text-center mb-2">
                            <i class="fas fa-map-marker-alt me-1"></i><?php echo $row["location"]; ?>
                        </h6>
                        <p class="text-muted small text-center" style="height: 60px; overflow: hidden; text-overflow: ellipsis;">
                            <?php echo $row["description"]; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<style>
    .card:hover {
        background-color: #e0e0e0 !important;
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .breadcrumb-item a {
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .px-5 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }
</style>

<?php include('footer.php'); ?>
