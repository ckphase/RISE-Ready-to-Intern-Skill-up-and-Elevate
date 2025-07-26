<?php include('header.php'); ?>
<?php include('../dbms/connection.php'); ?>

<!-- Cursor Circles -->
<div class="cursor-circle circle-1"></div>
<div class="cursor-circle circle-2"></div>

<script>
  const circle1 = document.querySelector(".circle-1");
  const circle2 = document.querySelector(".circle-2");

  document.addEventListener("mousemove", (e) => {
    const { clientX: x, clientY: y } = e;
    circle1.style.left = `${x}px`;
    circle1.style.top = `${y}px`;
    circle2.style.left = `${x}px`;
    circle2.style.top = `${y}px`;
  });
</script>

<!-- === HERO SECTION === -->
<section class="hero-section">
  <div class="container-fluid p-0 m-0">
    <div class="row g-0 m-0 p-0">

      <!-- Left: Hero Text -->
      <div class="col-lg-6 d-flex align-items-center justify-content-center text-black" style="height: 100vh;">
        <div class="hero-text px-5">
          <h1 class="display-4 fw-bold">Find Your Perfect Industrial Training</h1>
          <p class="lead mb-4">Discover hundreds of curated training opportunities tailored to your career goals and interests.</p>
          <a href="#explore" class="btn btn-lg px-4 text-light" style="background-color: #1554b1ff;">Explore Opportunities</a>
        </div>
      </div>

      <!-- Right: Grid Boxes -->
      <div class="col-lg-6 d-flex align-items-center justify-content-center p-0" style="height: 100vh;">
        <div class="box-grid w-100 h-100">
          <?php 
            $inactive = [0,1,2,3,12,13,24,25,26,27,36,37,38,39,40,41,42,48,49,50,51,52,53,54,55,60,61,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,80,84,85,86,87,88,89,90,91,96,97,98,99,101,102,109,110,111,112,120,121,124,132];
            for ($i = 0; $i < 144; $i++) {
              $class = in_array($i, $inactive) ? 'grid-box inactive-box' : 'grid-box';
              $style = !in_array($i, $inactive) ? "style='--i:$i'" : "";
              echo "<div class='$class' $style></div>";
            }
          ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- === CSS STYLES === -->
<style>
/* Cursor circles */
.cursor-circle {
  position: fixed;
  pointer-events: none;
  border-radius: 50%;
  border: 1px solid #0d6efd;
  z-index: 9999;
}
.circle-1 {
  width: 15px;
  height: 15px;
  transform: translate(-50%, -50%);
}
.circle-2 {
  width: 40px;
  height: 40px;
  transform: translate(-50%, -50%);
  border: 2px solid #0d6efd;
}

/* Hero layout */
.hero-section {
  background: url('../img/landing-2.avif') no-repeat center center fixed;
  background-size: cover;
  height: 100vh;
  overflow: hidden;
}
.hero-text {
  max-width: 600px;
  animation: fadeInLeft 1s ease-out forwards;
  opacity: 0;
}
@keyframes fadeInLeft {
  0% { transform: translateX(-50px); opacity: 0; }
  100% { transform: translateX(0); opacity: 1; }
}

/* Grid setup */
.box-grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-template-rows: repeat(12, 1fr);
  width: 100%;
  height: 100%;
}
.grid-box {
  background-color: grey;
  border: 0.1px solid #fff;
  background-image: linear-gradient(to right, #0d6efd, #0d6efd);
  background-size: 0% 100%;
  background-repeat: no-repeat;
  background-position: left;
  transition: background-size 0.4s ease;
  animation: fallDown 0.1s ease-out forwards;
  opacity: 0;
}
.grid-box:hover {
  background-size: 100% 100%;
}
.grid-box:nth-child(n) {
  animation-delay: calc(0.02s * var(--i));
}
@keyframes fallDown {
  0% { transform: translateY(-50px); opacity: 0; }
  100% { transform: translateY(0); opacity: 1; }
}

/* Inactive grid boxes */
.inactive-box {
  border: none !important;
  background: transparent !important;
  pointer-events: none;
}
</style>



<!-- === CATEGORIES SECTION === -->
<section id="categories" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Explore Training Categories</h2>
      <p class="text-muted">Find the perfect industrial training opportunity in your field of study</p>
    </div>
    <div class="row g-4">
      <?php
      $query = "SELECT * FROM internships LIMIT 8";
      $result = mysqli_query($db, $query);
      $icons = ["fa-cogs", "fa-laptop-code", "fa-network-wired", "fa-microscope", "fa-robot", "fa-database", "fa-paint-brush", "fa-briefcase"];
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $icon = $icons[$i % count($icons)];
        echo "
        <div class='col-lg-3 col-md-6'>
          <div class='card h-100 text-center shadow-sm border-0 category-card'>
            <div class='card-body p-4'>
              <div class='category-icon mb-3'>
                <i class='fas $icon fa-3x'></i>
              </div>
              <h5 class='card-title'>" . htmlspecialchars($row['title']) . "</h5>
              <p class='text-muted'>" . substr(htmlspecialchars($row['description']), 0, 80) . "...</p>
            </div>
          </div>
        </div>";
        $i++;
      }
      ?>
    </div>
  </div>
</section>

<!-- === ABOUT SECTION === -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- Images Column -->
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-6">
            <img src="../img/image2.jpeg" class="img-fluid rounded shadow" alt="Students working">
          </div>
          <div class="col-6">
            <img src="../img/image4.jpeg" class="img-fluid rounded shadow mt-4" alt="Professional team">
          </div>
        </div>
      </div>

      <!-- Text Column -->
      <div class="col-lg-6">
        <h2 class="fw-bold mb-4">Bridging University & Industry</h2>
        <p class="mb-4">
          UniTrain connects ambitious university students with leading companies offering industrial training,
          internships, and real-world experience.
        </p>
        <ul class="list-unstyled">
          <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Direct connections with 500+ partner companies</li>
          <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Comprehensive training across major fields</li>
          <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Career mentorship & guidance</li>
          <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Boost your resume with real-world projects</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>
