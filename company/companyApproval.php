 <?php
include("companyHeader.php");
?>
<div class="container">
 <!-- Register Section -->
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
        <!-- Main Content -->
</div>
<?php
include("companyFooter.php");
?>