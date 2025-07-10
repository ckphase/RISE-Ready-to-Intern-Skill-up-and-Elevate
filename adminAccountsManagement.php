<!-- Accounts Section -->
        <div id="accounts" class="content-section" style="display: none;">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-dark">Account Management</h2>
                    <p class="text-muted">Manage student and company accounts</p>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search accounts...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Types</option>
                        <option>Students</option>
                        <option>Companies</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Suspended</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-plus"></i> Add Account
                    </button>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Account</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user text-info me-2"></i>
                                            <div>
                                                <strong>John Doe</strong><br>
                                                <small class="text-muted">john.doe@email.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">Student</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2024-01-10</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-building text-success me-2"></i>
                                            <div>
                                                <strong>TechCorp Inc.</strong><br>
                                                <small class="text-muted">contact@techcorp.com</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Company</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2024-01-05</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm me-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>