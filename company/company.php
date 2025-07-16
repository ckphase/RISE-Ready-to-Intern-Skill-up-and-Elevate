<?php
include("companyHeader.php");
?>

<!-- Main Content -->

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
                <h1 class="fw-bold mb-1 text-uppercase text-white" style="letter-spacing: 1px;">Company <span class="text-black">Dashboard</span></h1>
                <p class="mb-0 small text-light">Find your industrial trainings!!</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid"></div>
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
                            <h3 class="fw-bold mb-0">72</h3>
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
                            <h3 class="fw-bold mb-0">93</h3>
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
                            <h3 class="fw-bold mb-0">23</h3>
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
                            <h3 class="fw-bold mb-0">24</h3>
                            <p class="text-muted mb-0">Applications Today</p>
                            <small class="text-success"><i class="fas fa-arrow-up"></i> +23%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-chart-line me-2"></i>Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3"><i class="fas fa-user text-success me-2"></i>New application from John Doe
                            </li>
                            <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Internship posted
                                successfully</li>
                            <li class="mb-3"><i class="fas fa-envelope text-info me-2"></i>Message sent to 3 candidates
                            </li>
                            <li class="mb-3"><i class="fas fa-star text-warning me-2"></i>Profile updated</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-bullhorn me-2"></i>Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-gradient mb-2 w-100" onclick="showSection('post-opportunities')">
                            <i class="fas fa-plus me-2"></i>Post New Opportunity
                        </button>
                        <button class="btn btn-gradient mb-2 w-100" onclick="showSection('applications')">
                            <i class="fas fa-eye me-2"></i>Review Applications
                        </button>
                        <button class="btn btn-gradient w-100" onclick="showSection('contact')">
                            <i class="fas fa-envelope me-2"></i>Contact Students
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include("companyFooter.php");
?>