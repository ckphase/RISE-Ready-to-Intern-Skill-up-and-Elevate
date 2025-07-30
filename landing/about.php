<?php 
include ('header.php');
?>

<!-- About Hero Section -->
<div class="container-xxl bg-dark page-header mb-5" style="padding-left: 60px; background: url('../img/landing-2.avif') no-repeat center center fixed;background-size: cover;">
    <div class="my-5 pt-5 pb-4">
          <h1 class="display-5 fw-bold">About RISE</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End About Hero Section -->

<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="row g-0 about-bg rounded overflow-hidden">
          <div class="col-6 text-start">
            <img class="img-fluid w-100" src="../img/image1.jpeg" alt="Internship image 1">
          </div>
          <div class="col-6 text-start">
            <img class="img-fluid" src="../img/image2.jpeg" style="width: 85%; margin-top: 15%;" alt="Internship image 2">
          </div>
          <div class="col-6 text-end">
            <img class="img-fluid" src="../img/image3.jpeg" style="width: 85%;" alt="Internship image 3">
          </div>
          <div class="col-6 text-end">
            <img class="img-fluid w-100" src="../img/image4.jpeg" alt="Internship image 4">
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
        <h1 class="mb-4">Your Bridge to the Right Internship & Skill Growth</h1>
        <p class="mb-4">
          <strong>RISE</strong> (Ready to Intern, Skill up, and Elevate) is your university-based gateway to discover the best summer trainings and internships. We make it simple for students to explore opportunities based on location, cost, start dates, and skill levels.
        </p>
        <p><i class="fa fa-check text-primary me-3"></i>Explore verified internships with clear info on location and duration</p>
        <p><i class="fa fa-check text-primary me-3"></i>Compare by stipend, fees, and starting dates easily</p>
        <p><i class="fa fa-check text-primary me-3"></i>Skill up with learning-based trainings curated for university students</p>
      </div>
    </div>
  </div>
</div>
<!-- About End -->

<?php 
include ('footer.php');
?>
<style>
    .box-grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-auto-rows: 36px;
  gap: 2px;
}

.grid-box {
  background-color: #808080;
  width: 100%;
  height: 100%;
  transition: background-color 0.3s ease;
}

.grid-box:hover {
  background-color: #007aad;
}

.inactive-box {
  border: none !important;
    background: transparent !important;
    pointer-events: none;
}

</style>
