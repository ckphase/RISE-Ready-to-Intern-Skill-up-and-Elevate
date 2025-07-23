<?php
session_start(); // ✅ Always at the top

// Store company_id from URL into session once
if (isset($_GET['id'])) {
    $_SESSION['company_id'] = intval($_GET['id']);
}

// Now retrieve it
if (!isset($_SESSION['company_id'])) {
    // Redirect if ID is missing
    header("Location: companyLogin.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("studentheader.php");
include('../dbms/connection.php');

// Now you can safely use $company_id in your queries
?>

<div class="container-fluid text-white" style="
    background: rgba(136, 211, 238, 1);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top:40px;
    padding-bottom:40px;
">

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Your Profile and Details
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Profile Page</h4>
            </div>
        </div>
    </div>
</div>
<!-- Applications Section -->
<div id="applications">
    <div class="container-xxl">
        <h2 class="mb-4">My Applications</h2>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1">Software Engineering Intern</h5>
                        <p class="text-muted mb-1"><strong>TechCorp Solutions</strong></p>
                        <small class="text-muted">Applied: March 15, 2024 | Application ID: #APP001</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-warning fs-6">
                            <i class="fas fa-clock me-1"></i>Under Review
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1">Data Science Trainee</h5>
                        <p class="text-muted mb-1"><strong>DataFlow Analytics</strong></p>
                        <small class="text-muted">Applied: March 10, 2024 | Application ID: #APP002</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-info fs-6">
                            <i class="fas fa-calendar-check me-1"></i>Interview Scheduled
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1">ML Engineering Intern</h5>
                        <p class="text-muted mb-1"><strong>InnovateLab</strong></p>
                        <small class="text-muted">Applied: March 8, 2024 | Application ID: #APP003</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-success fs-6">
                            <i class="fas fa-trophy me-1"></i>Offer Extended
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1">UI/UX Design Intern</h5>
                        <p class="text-muted mb-1"><strong>CreativeStudio</strong></p>
                        <small class="text-muted">Applied: March 5, 2024 | Application ID: #APP004</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-danger fs-6">
                            <i class="fas fa-times-circle me-1"></i>Not Selected
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-1">Business Analyst Intern</h5>
                        <p class="text-muted mb-1"><strong>Strategic Consulting Group</strong></p>
                        <small class="text-muted">Applied: March 1, 2024 | Application ID: #APP005</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge bg-secondary fs-6">
                            <i class="fas fa-paper-plane me-1"></i>Application Submitted
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('studentfooter.php');
?>