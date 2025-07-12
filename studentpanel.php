<?php
include('studentheader.php');
?>
<!-- Dashboard Section -->
<div id="dashboard" class="content-section active">
    <!-- Breadcrumb Section -->
    <div class="container-fluid text-white py-5 px-4 mb-5" 
         style="
            background: rgb(157,168,172);
                        url('https://images.unsplash.com/photo-1605902711622-cfb43c4437d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
            background-size: cover;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        ">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold mb-3">Dashboard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
</div>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card text-center">
                    <i class="fas fa-paper-plane fa-3x mb-3"></i>
                    <h3>12</h3>
                    <p>Applications Sent</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card-2 text-center">
                    <i class="fas fa-calendar-check fa-3x mb-3"></i>
                    <h3>3</h3>
                    <p>Interviews Scheduled</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card-3 text-center">
                    <i class="fas fa-trophy fa-3x mb-3"></i>
                    <h3>1</h3>
                    <p>Offers Received</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card-4 text-center">
                    <i class="fas fa-eye fa-3x mb-3"></i>
                    <h3>45</h3>
                    <p>Companies Viewed</p>
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

<!-- Profile Section -->
<div id="profile" class="content-section">
    <div class="container-fluid">
        <h2 class="mb-4">My Profile</h2>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-user me-2"></i>Profile Information</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" value="John Doe">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="john.doe@university.edu">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567">
                            </div>
                            <div class="mb-3">
                                <label for="university" class="form-label">University</label>
                                <input type="text" class="form-control" id="university" value="State University">
                            </div>
                            <div class="mb-3">
                                <label for="major" class="form-label">Major</label>
                                <input type="text" class="form-control" id="major" value="Computer Science">
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year of Study</label>
                                <select class="form-select" id="year">
                                    <option value="">Select Year</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3" selected>3rd Year</option>
                                    <option value="4">4th Year</option>
                                    <option value="graduate">Graduate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gpa" class="form-label">GPA</label>
                                <input type="number" class="form-control" id="gpa" step="0.01" min="0" max="4" value="3.75">
                            </div>
                            <div class="mb-3">
                                <label for="skills" class="form-label">Skills</label>
                                <textarea class="form-control" id="skills" rows="3">Python, JavaScript, React, Node.js, SQL, Git</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="experience" class="form-label">Previous Experience</label>
                                <textarea class="form-control" id="experience" rows="4">Completed a summer internship at StartupXYZ where I developed web applications using React and Node.js. Built several personal projects including an e-commerce platform and a task management app.</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Resume</label>
                                <input type="file" class="form-control" id="resume" accept=".pdf,.doc,.docx">
                                <div class="form-text">Current: resume_john_doe.pdf</div>
                            </div>
                            <div class="mb-3">
                                <label for="portfolio" class="form-label">Portfolio URL</label>
                                <input type="url" class="form-control" id="portfolio" value="https://johndoe.dev">
                            </div>
                            <div class="mb-3">
                                <label for="linkedin" class="form-label">LinkedIn Profile</label>
                                <input type="url" class="form-control" id="linkedin" value="https://linkedin.com/in/johndoe">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Save Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Companies Section -->
<div id="companies" class="content-section">
    <div class="container-fluid">
        <h2 class="mb-4">Available Companies</h2>
        
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <input type="text" class="form-control" placeholder="Search companies...">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option value="all">All Industries</option>
                            <option value="technology">Technology</option>
                            <option value="finance">Finance</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="consulting">Consulting</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-laptop me-2"></i>TechCorp Solutions
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> Software Development<br>
                            <strong>Location:</strong> San Francisco, CA<br>
                            <strong>Positions:</strong> Software Engineering Intern, UI/UX Design Intern<br>
                            <strong>Duration:</strong> 3-6 months
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-chart-line me-2"></i>DataFlow Analytics
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> Data Science & Analytics<br>
                            <strong>Location:</strong> New York, NY<br>
                            <strong>Positions:</strong> Data Science Trainee, Business Analyst Intern<br>
                            <strong>Duration:</strong> 4-8 months
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-brain me-2"></i>InnovateLab
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> AI & Machine Learning<br>
                            <strong>Location:</strong> Austin, TX<br>
                            <strong>Positions:</strong> ML Engineering Intern, Research Assistant<br>
                            <strong>Duration:</strong> 6 months
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-heartbeat me-2"></i>HealthTech Innovations
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> Healthcare Technology<br>
                            <strong>Location:</strong> Boston, MA<br>
                            <strong>Positions:</strong> Software Developer Intern, Product Management Trainee<br>
                            <strong>Duration:</strong> 3-4 months
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-briefcase me-2"></i>Strategic Consulting Group
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> Management Consulting<br>
                            <strong>Location:</strong> Chicago, IL<br>
                            <strong>Positions:</strong> Business Analyst Intern, Strategy Consultant Trainee<br>
                            <strong>Duration:</strong> 10-12 weeks
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="fas fa-university me-2"></i>FinanceFlow Corp
                        </h5>
                        <p class="card-text">
                            <strong>Industry:</strong> Financial Services<br>
                            <strong>Location:</strong> New York, NY<br>
                            <strong>Positions:</strong> Financial Analyst Intern, Risk Management Trainee<br>
                            <strong>Duration:</strong> 12 weeks
                        </p>
                        <button class="btn btn-primary w-100">
                            <i class="fas fa-eye me-1"></i>View Opportunities
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Applications Section -->
<div id="applications" class="content-section">
    <div class="container-fluid">
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

<!-- Messages Section -->
<div id="messages" class="content-section">
    <div class="container-fluid">
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
                <p class="mb-3">We are pleased to inform you that your application for the Data Science Trainee position has been reviewed and we would like to invite you for an interview.</p>
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
                <p class="mb-3">We are excited to extend an offer for the ML Engineering Intern position at InnovateLab!</p>
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
                <p class="mb-3">Thank you for your interest in the Software Engineering Intern position at TechCorp Solutions.</p>
                <p class="mb-3">Your application is currently under review by our technical team. We expect to complete the initial screening process by March 20, 2024, and will contact you with next steps.</p>
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