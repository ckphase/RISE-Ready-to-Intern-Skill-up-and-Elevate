<?php
include("companyHeader.php");
?>
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
<?php
include("companyFooter.php");
?>