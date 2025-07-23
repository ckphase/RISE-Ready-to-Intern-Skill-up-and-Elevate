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
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Contact Your Candidates
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Email Page</h4>
            </div>
        </div>
    </div>
</div> 
<div class="container">
       <!-- Contact Section -->
        <div id="contact" class="content-section py-3">
            <h2 class="mb-4">Contact Selected Students</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Selected Students</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <span class="text-white fw-bold small">JS</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Jane Smith</strong><br>
                                        <small class="text-muted">Marketing Intern</small>
                                    </div>
                                    <input type="checkbox" class="form-check-input" checked>
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <span class="text-white fw-bold small">AL</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Alex Lee</strong><br>
                                        <small class="text-muted">Software Intern</small>
                                    </div>
                                    <input type="checkbox" class="form-check-input">
                                </div>
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                        <span class="text-white fw-bold small">SW</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <strong>Sarah Wilson</strong><br>
                                        <small class="text-muted">HR Training</small>
                                    </div>
                                    <input type="checkbox" class="form-check-input" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Compose Message</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" placeholder="Enter message subject">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="8" placeholder="Type your message here..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Attachment (Optional)</label>
                                    <input type="file" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-gradient">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<?php
include("companyFooter.php");
?>