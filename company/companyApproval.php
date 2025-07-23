<?php
session_start();

if (!isset($_SESSION['company_id'])) {
    header("Location: login.php");
    exit();
}
$company_id = $_SESSION['company_id'];

include("companyHeader.php");
include('../dbms/connection.php');

$query = "SELECT * FROM users WHERE id = $company_id";
$result = mysqli_query($db, $query);
if ($row = mysqli_fetch_assoc($result)) {
    $company_name = $row['name'];
    $company_email = $row['email'];
}
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
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Check Your Status
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Approval Status Page</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!-- opening form-->
    <!-- <div id="register" class="content-section">
            <h2 class="mb-4"><i class="fas fa-user-plus me-2"></i>Company Registration</h2>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" placeholder="Enter company name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Industry</label>
                                <select class="form-select">
                                    <option>Select Industry</option>
                                    <option>Technology</option>
                                    <option>Healthcare</option>
                                    <option>Finance</option>
                                    <option>Education</option>
                                    <option>Manufacturing</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="company@example.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" placeholder="+1 (555) 123-4567">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="3" placeholder="Enter company address"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" placeholder="https://company.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Size</label>
                                <select class="form-select">
                                    <option>Select Size</option>
                                    <option>1-10 employees</option>
                                    <option>11-50 employees</option>
                                    <option>51-200 employees</option>
                                    <option>201-500 employees</option>
                                    <option>500+ employees</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Description</label>
                            <textarea class="form-control" rows="4" placeholder="Describe your company..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-save me-2"></i>Register Company
                        </button>
                    </form>
                </div>
            </div>
        </div> -->

    <!-- Approval Status Section -->
    <!-- <div id="approval" class="content-section py-4 justify-content-center">
            <h2 class="mb-4"><i class="fas fa-clock me-2"></i>Approval Status</h2>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-hourglass-half fa-5x text-warning mb-3"></i>
                        <h4>Registration Under Review</h4>
                        <p class="text-muted">Your company registration is currently being reviewed by our team.</p>
                    </div>
                    <div class="container">
                    <div class="row d-grid">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                                    <h6>Application Submitted</h6>
                                    <small class="text-muted">Dec 15, 2024</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-eye fa-2x mb-2"></i>
                                    <h6>Under Review</h6>
                                    <small>Current Status</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <i class="fas fa-clock fa-2x mb-2 text-muted"></i>
                                    <h6>Approval Pending</h6>
                                    <small class="text-muted">Estimated: 2-3 days</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p><strong>What happens next?</strong></p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Document verification</li>
                            <li><i class="fas fa-check text-success me-2"></i>Company information review</li>
                            <li><i class="fas fa-clock text-warning me-2"></i>Final approval</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div> -->
    <!-- Main Content -->
    <!-- Timeline 1 - Bootstrap Brain Component -->
    <section class="bsb-timeline-1 py-xl-5" style="text-align: justify;">
        <div class="container">
            <div class="row">
                <div class="col-6 text-justify pe-5">

                    <div class="row justify-content-start">
                        <h3 class="mb-4">Track Your Status</h3>
                    </div>
                    <p class="card-text m-0">This timeline provides a comprehensive overview of the entire company
                        registration process, including each stage from initial submission to final approval. It also
                        explains the meaning behind each status update, helping you understand where your application
                        stands and what steps are required for successful onboarding.</p>
                    <div class="row py-4">

                        <div class="col-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                                    <h6>Application Submitted</h6>
                                    <small class="text-muted">Dec 15, 2024</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-eye fa-2x mb-2"></i>
                                    <h6>Under Review</h6>
                                    <small>Current Status</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-text m-0">
                        Status updates usually take 5–6 business days after registration. Please be patient while we
                        review your application.
                    </p>
             
                        <h5 class="pt-3">Need Help?</h5>
                        <p class="card-text m-0"> If your approval process is taking more than 5–6 business days,<br>
  don’t worry — you can always reach out to our support team for assistance.</p>
           


                </div>
                <div class="col">

                    <ul class="timeline">
                        <li class="timeline-item">
                            <div class="timeline-body">
                                <div class="timeline-content">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <h5 class="card-subtitle text-secondary mb-1">Step 1</h5>
                                            <h2 class="card-title mb-3">Registration</h2>
                                            <p class="card-text m-0"> The first step involves registering on the
                                                platform by providing essential details such as company name, email, and
                                                contact information. This initiates the process and creates a company
                                                profile in the system.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-item">
                            <div class="timeline-body">
                                <div class="timeline-content">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <h5 class="card-subtitle text-secondary mb-1">Step 2</h5>
                                            <h2 class="card-title mb-3">We’re Reviewing</h2>
                                            <p class="card-text m-0"><b>Every detail matters, so we take time to review
                                                    carefully.</b> <br>
                                                Once your registration is submitted, our team begins the approval
                                                process. We review your information, verify documents, and ensure
                                                everything aligns with our platform’s standards and policies.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-item">
                            <div class="timeline-body">
                                <div class="timeline-content">
                                    <div class="card border-0">
                                        <div class="card-body p-0">
                                            <h5 class="card-subtitle text-secondary mb-1">Step 3</h5>
                                            <h2 class="card-title mb-3">You’re In! Welcome Aboard</h2>
                                            <p class="card-text m-0">From here, you gain full access to the platform’s
                                                features and can start engaging with services, tools, or opportunities
                                                available to you. It’s the beginning of your official journey with us!

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
</div>
<?php
include("companyFooter.php");
?>