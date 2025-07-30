<?php include('header.php'); ?>
<?php include('../dbms/connection.php'); ?>

<!-- HERO SECTION -->
<section class="hero-section" style="background: url('../img/landing-2.avif') no-repeat center center fixed; background-size: cover; height: 100vh; overflow: hidden;">
  <div class="container-fluid p-0 m-0">
    <div class="row g-0 m-0 p-0">

      <!-- Left: Hero Text -->
      <div class="col-lg-6 d-flex align-items-center justify-content-right text-black" style="height: 100vh;" data-aos="fade-right">
        <div class="hero-text px-5" style="max-width: 90%; text-align: left; margin-left: 50px">
          <h1 class="display-4 fw-bold">Find Your Perfect Industrial Training</h1>
          <p class="lead mb-4">Discover hundreds of curated training opportunities tailored to your career goals and interests.</p>
          <a href="#categories" class="btn btn-lg px-4 text-light" style="background-color: #0098ff;">Explore Opportunities</a>
        </div>
      </div>

      <!-- Right: Grid Boxes -->
      <div class="col-lg-6 d-flex align-items-center justify-content-center p-0" style="height: 100vh;" data-aos="fade-left">
        <div class="box-grid w-100 h-100">
          <?php 
            $inactive = [0,1,2,3,12,13,24,25,26,27,36,37,38,39,40,41,42,48,49,50,51,52,53,54,55,60,61,62,63,64,65,66,67,68,69,72,73,74,75,76,77,78,79,80,84,85,86,87,88,89,90,91,96,98,99,101,102,109,110,111,112,120,121,124,132];
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

<!-- CATEGORIES SECTION -->
<section id="categories" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
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
          <div class='col-lg-3 col-md-6' data-aos='zoom-in'>
            <div class='card category-card h-100 text-center shadow-sm'>
              <div class='card-body p-4'>
                <div class='category-icon mb-3'>
                  <i class='fas $icon fa-3x text-primary'></i>
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

<!-- ABOUT SECTION -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="row g-3">
          <div class="col-6">
            <img src="../img/image2.jpeg" class="img-fluid rounded shadow" alt="Students working">
          </div>
          <div class="col-6">
            <img src="../img/image4.jpeg" class="img-fluid rounded shadow mt-4" alt="Professional team">
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h2 class="fw-bold mb-4">Bridging University & Industry</h2>
        <p class="mb-4">RISE connects ambitious university students with leading companies offering industrial training, internships, and real-world experience.</p>
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

<!-- === INLINE CSS === -->
<style>
  html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    width: 100%;
  }

  .cursor-circle {
    position: fixed;
    pointer-events: none;
    border-radius: 50%;
    border: 1px solid #0d6efd;
    z-index: 9999;
    top: 0;
    left: 0;
    transform: translate(-50%, -50%);
  }


  .box-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-template-rows: repeat(12, 1fr);
    width: 100%;
    height: 100%;
  }

  @media (max-width: 768px) {
    .box-grid {
      grid-template-columns: repeat(6, 1fr);
      grid-template-rows: repeat(6, 1fr);
    }
  }

  @media (max-width: 480px) {
    .box-grid {
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(4, 1fr);
    }
  }

  .grid-box {
    background-color: grey;
    border: 0.1px solid #fff;
    transition: background-color 0.2s ease-in-out;
    animation: fallDown 0s ease-in forwards;
    opacity: 0;
  }

  .grid-box.hovered {
    background-color: #0d6efd;
  }

  .grid-box:nth-child(n) {
    animation-delay: calc(0.02s * var(--i));
  }

  @keyframes fallDown {
    0% { transform: translateY(-50px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }

  .inactive-box {
    border: none !important;
    background: transparent !important;
    pointer-events: none;
  }

  .category-card {
    transition: transform 0.3s ease;
  }

  .category-card:hover {
    transform: translateY(-10px);
  }

  .img-fluid:hover {
    transform: scale(1.03);
    transition: all 0.3s ease;
  }
</style>
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

  document.querySelectorAll('.grid-box').forEach(box => {
    box.addEventListener('mouseenter', () => {
      box.classList.add('hovered');
    });

    box.addEventListener('mouseleave', () => {
      setTimeout(() => {
        box.classList.remove('hovered');
      }, 2000); // Keeps color for 2s after hover
    });
  });
</script>
<!-- === AOS LIBRARY === -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
