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

include("companyHeader.php");
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
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Post and Check Your Openings
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Profile Page</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
        <!-- Post Opportunities Section -->
        <div id="post-opportunities" class="content-section py-4">
            <h2 class="mb-4">Post Internships / Trainings</h2>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opportunity Type</label>
                                <select class="form-select">
                                    <option>Select Type</option>
                                    <option>Internship</option>
                                    <option>Training Program</option>
                                    <option>Part-time Job</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Position Title</label>
                                <input type="text" class="form-control" placeholder="e.g., Software Development Intern">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select">
                                    <option>Select Department</option>
                                    <option>Engineering</option>
                                    <option>Marketing</option>
                                    <option>Human Resources</option>
                                    <option>Finance</option>
                                    <option>Operations</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" placeholder="e.g., 3 months">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stipend/Salary</label>
                                <input type="text" class="form-control" placeholder="e.g., $1000/month">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location</label>
                                <select class="form-select">
                                    <option>Select Location</option>
                                    <option>Remote</option>
                                    <option>On-site</option>
                                    <option>Hybrid</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Description</label>
                            <textarea class="form-control" rows="4" placeholder="Describe the role, responsibilities, and what the intern/trainee will learn..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Requirements</label>
                            <textarea class="form-control" rows="3" placeholder="List the required skills, qualifications, and experience..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Benefits</label>
                            <textarea class="form-control" rows="2" placeholder="Mention any additional benefits or perks..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-paper-plane me-2"></i>Post Opportunity
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<?php
include("companyFooter.php");
?>