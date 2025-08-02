<?php
session_start();

// Store company_id from URL into session once
if (isset($_GET['id'])) {
    $_SESSION['company_id'] = intval($_GET['id']);
}

if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("companyHeader.php");
?>

<!-- Page Header -->
<div class="container-fluid text-white" style="background: rgba(136, 211, 238, 1); background-size: cover; box-shadow: 0 2px 10px rgba(0,0,0,0.3); padding: 40px 0;">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black">Contact Your Candidates</h2>
                <h4 class="mb-0 text-light">RISE Email Page</h4>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="container my-5">
    <form onsubmit="openMailDraft(event)">
        <div class="row">
            <!-- Left: Student List -->
            <div class="col-md-4">
                <div class="card border-3">
                    <div class="card-header">
                        <h5>Selected Students</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <!-- Student 1 -->
                            <div class="list-group-item d-flex align-items-center">
                                <div class="bg-success rounded-circle me-3 d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                    <span class="text-white fw-bold small">JS</span>
                                </div>
                                <div class="flex-grow-1">
                                    <strong>Jane Smith</strong><br>
                                    <small class="text-muted">Marketing Intern</small>
                                </div>
                                <input type="checkbox" name="selected_emails[]" class="form-check-input" value="janesmith@example.com" checked>
                            </div>

                            <!-- Student 2 -->
                            <div class="list-group-item d-flex align-items-center">
                                <div class="bg-primary rounded-circle me-3 d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                    <span class="text-white fw-bold small">AL</span>
                                </div>
                                <div class="flex-grow-1">
                                    <strong>Alex Lee</strong><br>
                                    <small class="text-muted">Software Intern</small>
                                </div>
                                <input type="checkbox" name="selected_emails[]" class="form-check-input" value="alexlee@example.com">
                            </div>

                            <!-- Student 3 -->
                            <div class="list-group-item d-flex align-items-center">
                                <div class="bg-info rounded-circle me-3 d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
                                    <span class="text-white fw-bold small">SW</span>
                                </div>
                                <div class="flex-grow-1">
                                    <strong>Sarah Wilson</strong><br>
                                    <small class="text-muted">HR Training</small>
                                </div>
                                <input type="checkbox" name="selected_emails[]" class="form-check-input" value="sarahwilson@example.com" checked>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Compose Message -->
            <div class="col-md-8">
                <div class="card border-3">
                    <div class="card-header">
                        <h5>Compose Message</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter message subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="8" placeholder="Type your message here..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Attachment</label>
                            <input type="file" class="form-control" disabled title="Attachments not supported with mail drafts.">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i>Open Mail Draft
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- JavaScript to handle mailto draft -->
<script>
function openMailDraft(event) {
    event.preventDefault();

    const emails = [...document.querySelectorAll('input[name="selected_emails[]"]:checked')]
        .map(input => input.value)
        .join(',');

    const subject = encodeURIComponent(document.querySelector('input[name="subject"]').value.trim());
    const body = encodeURIComponent(document.querySelector('textarea[name="message"]').value.trim());

    if (!emails) {
        alert("Please select at least one student.");
        return;
    }

    const mailto = `mailto:${emails}?subject=${subject}&body=${body}`;
    window.location.href = mailto;
}
</script>

<?php include("companyFooter.php"); ?>
