<?php
include('header.php');
?>
<section class="search-section" style="
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url('../img/landing.avif');
  background-size: cover;
  background-position: center;
  padding: 130px 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
">
  <div class="container text-center" style="max-width: 900px; margin: 0 auto;">
    <h1 style="
      color: #ffffff;
      font-size: 56px;
      font-weight: 900;
      line-height: 1.2;
      text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.9);
      margin-bottom: 25px;
    ">
      Find Your Perfect Industrial Training
    </h1>

    <p style="
      color: #e0e0e0;
      font-size: 22px;
      font-weight: 400;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      margin-bottom: 35px;
    ">
      Discover hundreds of curated training opportunities tailored to your career goals and interests.
    </p>
    <a href="#explore" style="
      display: inline-block;
      padding: 14px 32px;
      background-color: #ffffff;
      color: #333333;
      font-weight: 600;
      font-size: 18px;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
      transition: background-color 0.3s ease, color 0.3s ease;
    " onmouseover="this.style.backgroundColor='#f1f1f1'; this.style.color='#000';"
      onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#333';">
      Explore Opportunities
    </a>
  </div>
</section>



<!-- Categories Section -->
<!-- Categories Section -->
<section id="categories" class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h2 class="display-6 fw-bold">Explore Training Categories</h2>
        <p class="lead text-muted">Find the perfect industrial training opportunity in your field of study</p>
      </div>
    </div>

    <div class="row g-4">
      <?php
      include('../dbms/connection.php');

      // Fetch only 8 internships
      $query = "SELECT * FROM internships LIMIT 8";
      $result = mysqli_query($db, $query);

      // Array of Font Awesome icon classes
      $icons = [
        "fas fa-cogs",        // Mechanical
        "fas fa-laptop-code", // IT / Software
        "fas fa-network-wired", // Networking
        "fas fa-microscope",  // Research
        "fas fa-robot",       // Robotics
        "fas fa-database",    // Database
        "fas fa-paint-brush", // Design
        "fas fa-briefcase"    // Business
      ];

      $index = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $iconClass = $icons[$index % count($icons)];
      ?>
        <div class="col-lg-3 col-md-6">
          <div class="card h-100 text-center border-0 shadow-sm category-card">
            <div class="card-body p-4">
              <div class="category-icon mb-3">
                <i class="<?php echo $iconClass; ?> fa-3x text-primary"></i>
              </div>
              <h5 class="card-title"><?php echo $row["title"]; ?></h5>
              <p class="card-text text-muted"><?php echo $row["description"]?></p>
            </div>
          </div>
        </div>
      <?php
        $index++;
      }
      ?>
    </div>
  </div>
</section>


<!-- About Section -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-6">
            <img src="../img/image2.jpeg" class="img-fluid rounded shadow" alt="Students in meeting">
          </div>
          <div class="col-6">
            <img src="../img/image4.jpeg" class="img-fluid rounded shadow mt-4" alt="Professional training">
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <h2 class="display-6 fw-bold mb-4">Bridging University & Industry</h2>
        <p class="lead mb-4">UniTrain connects ambitious university students with leading companies offering industrial
          training, internships, and practical learning opportunities.</p>

        <div class="mb-4">
          <div class="d-flex align-items-center mb-3">
            <i class="fas fa-check-circle text-primary me-3 fs-5"></i>
            <span>Direct connections with 500+ partner companies</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <i class="fas fa-check-circle text-primary me-3 fs-5"></i>
            <span>Comprehensive training programs across all major fields</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <i class="fas fa-check-circle text-primary me-3 fs-5"></i>
            <span>Professional mentorship and career guidance</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <i class="fas fa-check-circle text-primary me-3 fs-5"></i>
            <span>Real-world experience to boost your resume</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include('footer.php');
?>