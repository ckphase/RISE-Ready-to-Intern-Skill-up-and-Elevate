<?php 
include ('header.php');
?>

<!-- About Hero Section -->
<section class="hero-section" style="background: url('../img/landing-2.avif') no-repeat center center fixed; background-size: cover; min-height: 450px; overflow: hidden;">
  <div class="container-fluid" style="padding-right: 0px">
    <div class="row g-0 align-items-center" style="min-height: 400px; padding-bottom: 0px;">

      <!-- Left: About Text -->
      <div class="col-lg-6 text-white px-5" data-aos="fade-right">
        <div class="hero-text">
          <h1 class="display-5 fw-bold">About RISE</h1>
          <p class="lead mb-3">At RISE, we aim to empower students through industry-aligned training, expert mentorship, and impactful opportunities tailored to boost their careers in the digital age.</p>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase bg-transparent p-0 m-0">
              <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
              <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Right: Decorative Grid -->
      <div class="col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade-left" style="min-height: 450px;">
        <div class="box-grid" style="width: 100%; height: 100%;">
          <?php 
            $inactive = [0,1,2,3,12,13,24,25,26,27,36,37,38,39,40,41,42,48,49,50,51,52,53,54,55,60,61,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,80,84,85,86,87,88,89,90,91,96,98,99,101,102,109,110,111,112,120,121,124];
            for ($i = 0; $i < 132; $i++) {
              $class = in_array($i, $inactive) ? 'grid-box inactive-box' : 'grid-box';
              echo "<div class='$class'></div>";
            }
          ?>
        </div>
      </div>

    </div>
  </div>
</section>
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
