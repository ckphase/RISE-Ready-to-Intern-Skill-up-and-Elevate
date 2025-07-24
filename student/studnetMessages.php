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
<!-- Messages Section -->
<div id="messages">
    <div class="container-xxl">
        <h2 class="mb-4">Company Messages</h2>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">
                        <i class="fas fa-building me-2"></i>DataFlow Analytics - HR Team
                    </h6>
                </div>
                <small>March 16, 2024</small>
            </div>
            <div class="card-body">
                <h6 class="text-success">
                    <i class="fas fa-calendar-check me-2"></i>Interview Invitation
                </h6>
                <p class="mb-3">Dear John,</p>
                <p class="mb-3">We are pleased to inform you that your application for the Data Science Trainee position
                    has been reviewed and we would like to invite you for an interview.</p>
                <div class="alert alert-info">
                    <h6>Interview Details:</h6>
                    <ul class="mb-0">
                        <li>Date: March 22, 2024</li>
                        <li>Time: 2:00 PM EST</li>
                        <li>Format: Virtual (Zoom link will be sent separately)</li>
                        <li>Duration: 45 minutes</li>
                    </ul>
                </div>
                <p class="mb-2">Please confirm your availability by replying to this message.</p>
                <p class="mb-0">
                    <strong>Best regards,</strong><br>
                    Sarah Johnson<br>
                    HR Manager
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">
                        <i class="fas fa-building me-2"></i>InnovateLab - Recruitment
                    </h6>
                </div>
                <small>March 14, 2024</small>
            </div>
            <div class="card-body">
                <h6 class="text-success">
                    <i class="fas fa-trophy me-2"></i>Congratulations! Internship Offer
                </h6>
                <p class="mb-3">Hi John,</p>
                <p class="mb-3">We are excited to extend an offer for the ML Engineering Intern position at InnovateLab!
                </p>
                <div class="alert alert-success">
                    <h6>Offer Details:</h6>
                    <ul class="mb-0">
                        <li>Position: ML Engineering Intern</li>
                        <li>Duration: 6 months (June - November 2024)</li>
                        <li>Stipend: $2,500/month</li>
                        <li>Location: Austin, TX (Hybrid)</li>
                        <li>Start Date: June 3, 2024</li>
                    </ul>
                </div>
                <p class="mb-2">Please review the attached offer letter and respond by March 21, 2024.</p>
                <p class="mb-0">
                    <strong>We look forward to having you on our team!</strong><br>
                    Michael Chen<br>
                    Engineering Manager
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">
                        <i class="fas fa-building me-2"></i>TechCorp Solutions - Talent Acquisition
                    </h6>
                </div>
                <small>March 12, 2024</small>
            </div>
            <div class="card-body">
                <h6 class="text-info">
                    <i class="fas fa-info-circle me-2"></i>Application Status Update
                </h6>
                <p class="mb-3">Dear John,</p>
                <p class="mb-3">Thank you for your interest in the Software Engineering Intern position at TechCorp
                    Solutions.</p>
                <p class="mb-3">Your application is currently under review by our technical team. We expect to complete
                    the initial screening process by March 20, 2024, and will contact you with next steps.</p>
                <p class="mb-2">If you have any questions, please don't hesitate to reach out.</p>
                <p class="mb-0">
                    <strong>Best regards,</strong><br>
                    Lisa Rodriguez<br>
                    Talent Acquisition Specialist
                </p>
            </div>
        </div>
    </div>
</div>
<?php
include('studentfooter.php');
?>