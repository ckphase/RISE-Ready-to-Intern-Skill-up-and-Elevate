<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RISE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- JavaScript Libraries (corrected paths) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery (must be first) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap Bundle -->
<script src="../lib/wow/wow.min.js"></script> <!-- WOW.js -->
<script src="../lib/owlcarousel/owl.carousel.min.js"></script> <!-- Owl Carousel -->

<!-- Initialization Scripts -->
<script>
    new WOW().init();

    $(document).ready(function(){
        $(".testimonial-carousel").owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            responsive: {
                0: { items: 1 },
                768: { items: 2 },
                992: { items: 3 }
            }
        });
    });
</script>
<!-- AOS for scroll animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow fixed-top p-0">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">RISE</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.php" class="dropdown-item">Industrial Trainings</a>
                            <a href="job-detail.php" class="dropdown-item">Internships</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">More</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.php" class="dropdown-item">Categories</a>
                            <a href="testimonial.php" class="dropdown-item disabled">Reviews</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="login.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        
        <!-- Navbar End -->

        
<!-- Cursor Circles -->
<div class="cursor-circle circle-1"></div>
<div class="cursor-circle circle-2"></div>
<style>
    .circle-1 { width: 15px; height: 15px; }
  .circle-2 { width: 40px; height: 40px; border: 2px solid #0d6efd; }
</style>
<!-- === JS: Cursor Tracking === -->
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