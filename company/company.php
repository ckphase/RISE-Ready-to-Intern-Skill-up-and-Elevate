<?php
include("companyHeader.php");
?>

    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Dashboard Section -->
        <div id="dashboard" class="content-section active">
            <div class="company-header">
                <h2><i class="fas fa-tachometer-alt me-2"></i>Company Dashboard</h2>
                <p class="mb-0">Welcome to your company management panel</p>
            </div>
            
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <h3>12</h3>
                        <p class="mb-0">Active Postings</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card success">
                        <h3>45</h3>
                        <p class="mb-0">Applications</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card warning">
                        <h3>8</h3>
                        <p class="mb-0">Selected</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card secondary">
                        <h3>3</h3>
                        <p class="mb-0">Hired</p>
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
                                <li class="mb-3"><i class="fas fa-user text-success me-2"></i>New application from John Doe</li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-2"></i>Internship posted successfully</li>
                                <li class="mb-3"><i class="fas fa-envelope text-info me-2"></i>Message sent to 3 candidates</li>
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

        <!-- Register Section -->
        <div id="register" class="content-section">
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
        </div>

        <!-- Approval Status Section -->
        <div id="approval" class="content-section">
            <h2 class="mb-4"><i class="fas fa-clock me-2"></i>Approval Status</h2>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-hourglass-half fa-5x text-warning mb-3"></i>
                        <h4>Registration Under Review</h4>
                        <p class="text-muted">Your company registration is currently being reviewed by our team.</p>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                                    <h6>Application Submitted</h6>
                                    <small class="text-muted">Dec 15, 2024</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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

        <!-- Profile Section -->
        <div id="profile" class="content-section">
            <h2 class="mb-4"><i class="fas fa-user-edit me-2"></i>Company Profile</h2>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" value="TechCorp Solutions">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Industry</label>
                                <select class="form-select">
                                    <option selected>Technology</option>
                                    <option>Healthcare</option>
                                    <option>Finance</option>
                                    <option>Education</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="contact@techcorp.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" value="+1 (555) 123-4567">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="3">123 Tech Street, Silicon Valley, CA 94000</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" value="https://techcorp.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Size</label>
                                <select class="form-select">
                                    <option>1-10 employees</option>
                                    <option selected>51-200 employees</option>
                                    <option>201-500 employees</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Description</label>
                            <textarea class="form-control" rows="4">Leading technology solutions provider specializing in software development and digital transformation.</textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Post Opportunities Section -->
        <div id="post-opportunities" class="content-section">
            <h2 class="mb-4"><i class="fas fa-plus-circle me-2"></i>Post Internships / Trainings</h2>
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

        <!-- Applications Section -->
        <div id="applications" class="content-section">
            <h2 class="mb-4"><i class="fas fa-file-alt me-2"></i>Student Applications</h2>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Position Applied</th>
                                    <th>Application Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold">JD</span>
                                            </div>
                                            <div>
                                                <strong>John Doe</strong><br>
                                                <small class="text-muted">john.doe@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Software Development Intern</td>
                                    <td>Dec 10, 2024</td>
                                    <td><span class="badge status-pending">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-success me-1" onclick="updateApplicationStatus(this, 'approved')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger me-1" onclick="updateApplicationStatus(this, 'rejected')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewApplication()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold">JS</span>
                                            </div>
                                            <div>
                                                <strong>Jane Smith</strong><br>
                                                <small class="text-muted">jane.smith@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Marketing Intern</td>
                                    <td>Dec 8, 2024</td>
                                    <td><span class="badge status-approved">Approved</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="contactStudent('Jane Smith')">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" onclick="viewApplication()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold">MB</span>
                                            </div>
                                            <div>
                                                <strong>Mike Brown</strong><br>
                                                <small class="text-muted">mike.brown@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Data Analysis Training</td>
                                    <td>Dec 5, 2024</td>
                                    <td><span class="badge status-rejected">Rejected</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="viewApplication()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact" class="content-section">
            <h2 class="mb-4"><i class="fas fa-envelope me-2"></i>Contact Selected Students</h2>
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