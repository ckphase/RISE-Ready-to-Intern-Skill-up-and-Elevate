<!-- Announcements Section -->
        <div id="announcements" class="content-section" style="display: none;">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold text-dark">Send Announcements</h2>
                    <p class="text-muted">Send announcements to students, companies, or all users</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="card-title mb-0">Create New Announcement</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Enter announcement title">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Recipients</label>
                                        <select class="form-select">
                                            <option>All Users</option>
                                            <option>Students Only</option>
                                            <option>Companies Only</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Priority</label>
                                        <select class="form-select">
                                            <option>Normal</option>
                                            <option>High</option>
                                            <option>Urgent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="5" placeholder="Enter your announcement message"></textarea>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>Send Announcement
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="fas fa-save me-2"></i>Save as Draft
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="card-title mb-0">Recent Announcements</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0">
                                    <h6 class="mb-1">New Internship Opportunities</h6>
                                    <p class="mb-1 small text-muted">Sent to all students</p>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                                <div class="list-group-item border-0 px-0">
                                    <h6 class="mb-1">System Maintenance</h6>
                                    <p class="mb-1 small text-muted">Sent to all users</p>
                                    <small class="text-muted">1 week ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>