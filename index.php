<?php
include('header.php');
?>
    <!-- Hero Carousel
    <section id="home" class="hero-section">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="hero-bg" style="background-image: url('https://images.pexels.com/photos/1181677/pexels-photo-1181677.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080')"></div>
            <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4 text-white">Find Your Perfect Industrial Training</h1>
                    <p class="lead mb-4 text-white">Connect with top companies offering internships and training opportunities for university students</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                      <a href="#opportunities" class="btn btn-primary btn-lg px-4">Browse Opportunities</a>
                      <a href="#about" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="carousel-item">
            <div class="hero-bg" style="background-image: url('https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080')"></div>
            <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4 text-white">Launch Your Career Journey</h1>
                    <p class="lead mb-4 text-white">Get hands-on experience with industry-leading companies and build your professional network</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                      <a href="#opportunities" class="btn btn-primary btn-lg px-4">Start Exploring</a>
                      <a href="#register" class="btn btn-outline-light btn-lg px-4">Register Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="carousel-item">
            <div class="hero-bg" style="background-image: url('https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080')"></div>
            <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4 text-white">Bridge Academia & Industry</h1>
                    <p class="lead mb-4 text-white">Transform your theoretical knowledge into practical skills through real-world training programs</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                      <a href="#opportunities" class="btn btn-primary btn-lg px-4">Find Training</a>
                      <a href="#companies" class="btn btn-outline-light btn-lg px-4">View Companies</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section> -->

    <!-- Search Section -->
    <section class="search-section bg-primary" style="background-image: url('img/landing.avif'); background-size: cover; background-position: center; padding: 170px 0;" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card shadow-lg border-0">
              <div class="card-body p-4">
                <div class="row g-3">
                  <div class="col-md-3">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="searchKeyword" placeholder="Enter keywords">
                      <label for="searchKeyword">
                        <i class="fas fa-search me-2"></i>Keywords
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating">
                      <select class="form-select" id="searchCategory">
                        <option value="">All Categories</option>
                        <option value="engineering">Engineering</option>
                        <option value="business">Business & Finance</option>
                        <option value="it">Information Technology</option>
                        <option value="marketing">Marketing & Sales</option>
                        <option value="design">Design & Creative</option>
                      </select>
                      <label for="searchCategory">
                        <i class="fas fa-folder me-2"></i>Category
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating">
                      <select class="form-select" id="searchLocation">
                        <option value="">All Locations</option>
                        <option value="kuala-lumpur">Kuala Lumpur</option>
                        <option value="selangor">Selangor</option>
                        <option value="penang">Penang</option>
                        <option value="johor">Johor</option>
                        <option value="remote">Remote</option>
                      </select>
                      <label for="searchLocation">
                        <i class="fas fa-map-marker-alt me-2"></i>Location
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-dark w-100 h-100" type="button" id="searchBtn">
                      <i class="fas fa-search me-2"></i>Search Opportunities
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-cogs fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Engineering</h5>
                <p class="card-text text-muted">Mechanical, Civil, Electrical & More</p>
                <span class="badge bg-primary">245 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-laptop-code fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Information Technology</h5>
                <p class="card-text text-muted">Software Development, Data Science, Cybersecurity</p>
                <span class="badge bg-primary">189 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-chart-line fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Business & Finance</h5>
                <p class="card-text text-muted">Accounting, Banking, Investment, Management</p>
                <span class="badge bg-primary">156 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-bullhorn fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Marketing & Sales</h5>
                <p class="card-text text-muted">Digital Marketing, Sales, Brand Management</p>
                <span class="badge bg-primary">134 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-palette fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Design & Creative</h5>
                <p class="card-text text-muted">Graphic Design, UI/UX, Architecture</p>
                <span class="badge bg-primary">98 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-flask fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Science & Research</h5>
                <p class="card-text text-muted">Laboratory, Research, Environmental Science</p>
                <span class="badge bg-primary">87 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-heartbeat fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Healthcare</h5>
                <p class="card-text text-muted">Medical, Nursing, Pharmacy, Biotechnology</p>
                <span class="badge bg-primary">76 Opportunities</span>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="card h-100 text-center border-0 shadow-sm category-card">
              <div class="card-body p-4">
                <div class="category-icon mb-3">
                  <i class="fas fa-users fa-3x text-primary"></i>
                </div>
                <h5 class="card-title">Human Resources</h5>
                <p class="card-text text-muted">HR Management, Recruitment, Training</p>
                <span class="badge bg-primary">65 Opportunities</span>
              </div>
            </div>
          </div>
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
                <img src="img/image2.jpeg" class="img-fluid rounded shadow" alt="Students in meeting">
              </div>
              <div class="col-6">
                <img src="img/image4.jpeg" class="img-fluid rounded shadow mt-4" alt="Professional training">
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <h2 class="display-6 fw-bold mb-4">Bridging University & Industry</h2>
            <p class="lead mb-4">UniTrain connects ambitious university students with leading companies offering industrial training, internships, and practical learning opportunities.</p>
            
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