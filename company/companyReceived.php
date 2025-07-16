<?php
include("companyHeader.php");
?>
<div class="container">
       <!-- Applications Section -->
        <div id="applications" class="content-section">
            <h2 class="mb-4"><i class="fas fa-file-alt me-2 mt-4"></i>Student Applications</h2>
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

</div> 
<?php
include("companyFooter.php");
?>