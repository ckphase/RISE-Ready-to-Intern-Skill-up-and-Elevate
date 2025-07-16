<?php
include("companyHeader.php");
?>
<div class="container">
        <!-- Profile Section -->
        <div id="profile" class="content-section">
            <h2 class="mb-4"><i class="fas fa-user-edit me-2 mt-5 mb-3"></i>Company Profile</h2>
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
</div>
<?php
include("companyFooter.php");
?>