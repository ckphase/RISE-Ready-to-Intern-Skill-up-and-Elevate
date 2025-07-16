<?php
include('studentheader.php')
?>
<!-- Profile Section -->
<div id="profile" >
    <div class="container">
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
                                <input type="number" class="form-control" id="gpa" step="0.01" min="0" max="4"
                                    value="3.75">
                            </div>
                            <div class="mb-3">
                                <label for="skills" class="form-label">Skills</label>
                                <textarea class="form-control" id="skills"
                                    rows="3">Python, JavaScript, React, Node.js, SQL, Git</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="experience" class="form-label">Previous Experience</label>
                                <textarea class="form-control" id="experience"
                                    rows="4">Completed a summer internship at StartupXYZ where I developed web applications using React and Node.js. Built several personal projects including an e-commerce platform and a task management app.</textarea>
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
                                <input type="url" class="form-control" id="linkedin"
                                    value="https://linkedin.com/in/johndoe">
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

<?php
include('studentfooter.php')
?>