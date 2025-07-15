<?php
include('studentheader.php');
?>

<!-- Breadcrumb Section -->
<div class="container-fluid text-white" style="
    background-image: url('../img/studentPanel.avif');
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top: 120px;
    padding-bottom: 120px;
">

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold mb-1 text-uppercase text-white" style="letter-spacing: 1px;">Student <span class="text-black">Dashboard</span></h1>
                <p class="mb-0 small text-light">Find your industrial trainings!!</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

<!-- Stats Cards -->
  <!-- Stats Cards -->
    <div class="row g-4 mt-3 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-users fs-4"></i>
                            </div>
                        </div>
                       
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"></h3>
                            <p class="text-muted mb-0">Total Students</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +12%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-building fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"></h3>
                            <p class="text-muted mb-0">Total Companies</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +5%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                       
                        <div class="flex-shrink-0">
                            <div class="bg-warning text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-briefcase fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"></h3>
                            <p class="text-muted mb-0">Active Internships</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i>20</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-info text-white rounded-3 p-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-file-alt fs-4"></i>
                            </div>
                        </div>
                       
                        <div class="flex-grow-1 ms-3">
                            <h3 class="fw-bold mb-0"></h3>
                            <p class="text-muted mb-0">Applications Today</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +23%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Recent Activity -->
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Recent Activity</h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-8">
                <h6 class="mb-1">Software Engineering Intern</h6>
                <p class="mb-1 text-muted">TechCorp Solutions</p>
                <small class="text-muted">Applied: 2 days ago</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-warning">Pending</span>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <h6 class="mb-1">Data Science Trainee</h6>
                <p class="mb-1 text-muted">DataFlow Analytics</p>
                <small class="text-muted">Applied: 1 week ago</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-success">Interview Scheduled</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.remove('active'));

        // Remove active class from all nav links
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => link.classList.remove('active'));

        // Show selected section
        document.getElementById(sectionId).classList.add('active');

        // Add active class to clicked link
        event.target.classList.add('active');
    }
</script>

<?php
include('studentfooter.php');
?>