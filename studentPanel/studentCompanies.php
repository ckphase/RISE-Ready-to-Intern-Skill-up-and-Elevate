<?php
include('studentheader.php');
?>
<!-- Companies Section -->
<div id="companies">
    <div class="container-xxl">
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
<?php
include('studentfooter.php');
?>