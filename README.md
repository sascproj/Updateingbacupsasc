wait this is my old superadmin dashboard <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UniFest 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #2C3E50;
            --secondary: #E74C3C;
            --accent: #F39C12;
            --success: #27AE60;
            --warning: #F1C40F;
            --info: #3498DB;
            --light: #ECF0F1;
            --dark: #2C3E50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(to bottom, var(--primary), #1a252f);
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 1rem;
            box-shadow: 3px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.8rem 1.5rem;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            margin: 2px 0;
        }

        .sidebar .nav-link.active, 
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-left: 4px solid var(--accent);
            color: white;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 2rem;
            transition: all 0.3s;
        }

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            border-radius: 10px;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-radius: 10px;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0.5rem 0;
        }

        .stat-label {
            color: var(--dark);
            font-weight: 500;
        }

        /* Progress Bars */
        .progress {
            height: 8px;
            margin: 5px 0;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background-color: #1a252f;
        }

        /* Tables */
        .table th {
            background-color: var(--primary);
            color: white;
            border: none;
        }
        
        /* Improved Quick Actions */
        .quick-actions .btn {
            padding: 0.75rem;
            font-size: 0.9rem;
        }
        
        /* Form Sections */
        .form-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        /* Tabs */
        .nav-tabs .nav-link.active {
            background-color: var(--primary);
            color: white;
            border: none;
        }
        
        /* Modal */
        .modal-header {
            background-color: var(--primary);
            color: white;
        }
        
        /* Loading animation */
        .btn-loading {
            position: relative;
        }
        
        .btn-loading .btn-text {
            visibility: visible;
        }
        
        .btn-loading.loading .btn-text {
            visibility: hidden;
        }
        
        .btn-loading.loading::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: button-loading-spinner 1s ease infinite;
        }
        
        @keyframes button-loading-spinner {
            from {
                transform: rotate(0turn);
            }
            to {
                transform: rotate(1turn);
            }
        }
        
        /* Dashboard Sections */
        .dashboard-section {
            display: none;
        }
        
        .dashboard-section.active {
            display: block;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .sidebar .nav-link span,
            .sidebar-header h4,
            .sidebar-header small {
                display: none;
            }
            
            .sidebar .nav-link {
                text-align: center;
                padding: 0.8rem 0.5rem;
            }
            
            .sidebar .nav-link i {
                margin-right: 0;
            }
            
            .content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header text-center">
            <h4><i class="fas fa-user-shield me-2"></i>Admin Panel</h4>
            <small class="text-muted">UniFest 2026</small>
        </div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link active" data-section="dashboard">
                <i class="fas fa-home me-2"></i><span>Dashboard</span>
            </a>
            <a href="#" class="nav-link" data-section="colleges">
                <i class="fas fa-university me-2"></i><span>Manage Colleges</span>
            </a>
            <a href="#" class="nav-link" data-section="competitions">
                <i class="fas fa-trophy me-2"></i><span>Competitions</span>
            </a>
            <a href="#" class="nav-link" data-section="judges">
                <i class="fas fa-gavel me-2"></i><span>Manage Judges</span>
            </a>
            <a href="#" class="nav-link" data-section="stage-controllers">
                <i class="fas fa-users-cog me-2"></i><span>Stage Controllers</span>
            </a>
            <a href="#" class="nav-link" data-section="results">
                <i class="fas fa-chart-line me-2"></i><span>Results & Analytics</span>
            </a>
            <a href="#" class="nav-link" data-section="settings">
                <i class="fas fa-cog me-2"></i><span>System Settings</span>
            </a>
            <div class="mt-auto">
                <a href="../index.php" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i><span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom rounded">
            <div class="container-fluid">
                <h4 class="mb-0 text-dark" id="pageTitle">
                    <i class="fas fa-graduation-cap me-2"></i>Admin Dashboard
                </h4>
                <div class="navbar-text">
                    <span class="text-muted">Welcome,</span> 
                    <strong>University Admin</strong>
                    <span class="badge bg-primary ms-2">Super Admin</span>
                </div>
            </div>
        </nav>
        
        <!-- Dashboard Section -->
        <div id="dashboard" class="dashboard-section active">
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="stat-number">15</div>
                        <div class="stat-label">Total Colleges</div>
                        <small class="text-success">+2 this week</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="stat-number">24</div>
                        <div class="stat-label">Competitions</div>
                        <small class="text-info">8 ongoing</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="stat-number">342</div>
                        <div class="stat-label">Participants</div>
                        <small class="text-warning">Active</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Judges</div>
                        <small class="text-success">All active</small>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                        </div>
                        <div class="card-body quick-actions">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-primary w-100 mb-2" onclick="showSection('colleges')">
                                        <i class="fas fa-plus me-2"></i>Add College
                                    </button>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-success w-100 mb-2" onclick="showSection('competitions')">
                                        <i class="fas fa-trophy me-2"></i>Create Competition
                                    </button>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-warning w-100 mb-2" onclick="showSection('judges')">
                                        <i class="fas fa-gavel me-2"></i>Assign Judges
                                    </button>
                                </div>
                                <div class="col-md-3 text-center">
                                    <button class="btn btn-info w-100 mb-2" onclick="showSection('results')">
                                        <i class="fas fa-chart-bar me-2"></i>View Reports
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Pending Approvals -->
            <div class="row">
                <!-- Recent Colleges -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-university me-2"></i>Recent Colleges</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">ABC College of Engineering</h6>
                                        <small class="text-muted">Registered: Today</small>
                                    </div>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">XYZ University</h6>
                                        <small class="text-muted">Registered: 2 days ago</small>
                                    </div>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">LMN Institute</h6>
                                        <small class="text-muted">Registered: 1 week ago</small>
                                    </div>
                                    <span class="badge bg-warning">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Results Approval -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Pending Approvals</h5>
                            <span class="badge bg-danger">3 pending</span>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Code Marathon Results</h6>
                                            <small class="text-muted">All judges completed evaluation</small>
                                        </div>
                                        <button class="btn btn-sm btn-success">Review</button>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-success" style="width: 100%">100%</div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Dance Competition</h6>
                                            <small class="text-muted">4/5 judges completed</small>
                                        </div>
                                        <button class="btn btn-sm btn-warning">Review</button>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bg-warning" style="width: 80%">80%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ongoing Competitions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-running me-2"></i>Ongoing Competitions</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Competition</th>
                                            <th>Category</th>
                                            <th>Participants</th>
                                            <th>Judges</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Code Marathon</strong>
                                                <br><small class="text-muted">Technical</small>
                                            </td>
                                            <td><span class="badge bg-info">Technical</span></td>
                                            <td>25/30</td>
                                            <td>5/5 assigned</td>
                                            <td><span class="badge bg-success">Live</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                                <button class="btn btn-sm btn-outline-warning">Manage</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Battle of Bands</strong>
                                                <br><small class="text-muted">Cultural</small>
                                            </td>
                                            <td><span class="badge bg-success">Cultural</span></td>
                                            <td>12/15</td>
                                            <td>3/5 assigned</td>
                                            <td><span class="badge bg-warning">Starting Soon</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                                <button class="btn btn-sm btn-outline-warning">Manage</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Colleges Section -->
        <div id="colleges" class="dashboard-section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-university me-2"></i>Manage Colleges</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCollegeModal">
                        <i class="fas fa-plus me-1"></i>Add New College
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>College Name</th>
                                    <th>Code</th>
                                    <th>Contact</th>
                                    <th>Participants</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ABC College of Engineering</td>
                                    <td>ABC001</td>
                                    <td>contact@abccollege.edu</td>
                                    <td>45</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-info">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>XYZ University</td>
                                    <td>XYZ002</td>
                                    <td>info@xyzuniversity.edu</td>
                                    <td>32</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-info">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Competitions Section -->
        <div id="competitions" class="dashboard-section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-trophy me-2"></i>Manage Competitions</h5>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCompetitionModal">
                        <i class="fas fa-plus me-1"></i>Create Competition
                    </button>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="competitionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#ongoing" type="button">Ongoing</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#upcoming" type="button">Upcoming</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#completed" type="button">Completed</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="ongoing">
                            <!-- Ongoing competitions table -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Competition</th>
                                            <th>Category</th>
                                            <th>Participants</th>
                                            <th>Judges</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Code Marathon</td>
                                            <td><span class="badge bg-info">Technical</span></td>
                                            <td>25/30</td>
                                            <td>5/5</td>
                                            <td><span class="badge bg-success">Live</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                                <button class="btn btn-sm btn-outline-warning">Manage</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="upcoming">
                            <!-- Upcoming competitions content -->
                        </div>
                        <div class="tab-pane fade" id="completed">
                            <!-- Completed competitions content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Judges Section -->
        <div id="judges" class="dashboard-section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-gavel me-2"></i>Manage Judges</h5>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addJudgeModal">
                        <i class="fas fa-user-plus me-1"></i>Add New Judge
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-section">
                        <h6>Add New Judge</h6>
                        <form id="addJudgeForm">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Specialization</label>
                                    <select class="form-select" name="specialization" required>
                                        <option value="">Select Specialization</option>
                                        <option value="technical">Technical</option>
                                        <option value="cultural">Cultural</option>
                                        <option value="sports">Sports</option>
                                        <option value="academic">Academic</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_number">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-user-plus me-1"></i>Create Judge Account
                            </button>
                        </form>
                    </div>

                    <h6>Existing Judges</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Specialization</th>
                                    <th>Assigned Competitions</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dr. Sharma</td>
                                    <td>sharma_judge</td>
                                    <td><span class="badge bg-info">Technical</span></td>
                                    <td>Code Marathon, Hackathon</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Reset Password</button>
                                        <button class="btn btn-sm btn-info">View Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stage Controllers Section -->
        <div id="stage-controllers" class="dashboard-section">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-users-cog me-2"></i>Manage Stage Controllers</h5>
                </div>
                <div class="card-body">
                    <div class="form-section">
                        <h6>Add New Stage Controller</h6>
                        <form id="addStageControllerForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Assigned Stages</label>
                                    <select class="form-select" name="assigned_stages" multiple required>
                                        <option value="1">Stage 1</option>
                                        <option value="2">Stage 2</option>
                                        <option value="3">Stage 3</option>
                                        <option value="4">Stage 4</option>
                                        <option value="5">Stage 5</option>
                                    </select>
                                    <small class="text-muted">Hold Ctrl to select multiple stages</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" name="contact_number">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-user-plus me-1"></i>Create Stage Controller Account
                            </button>
                        </form>
                    </div>

                    <h6>Existing Stage Controllers</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Assigned Stages</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="stageControllersList">
                                <tr>
                                    <td>Rajesh Kumar</td>
                                    <td>stage1_controller</td>
                                    <td><span class="badge bg-primary">Stage 1, Stage 2</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Reset Password</button>
                                        <button class="btn btn-sm btn-info">View Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results & Analytics Section -->
        <div id="results" class="dashboard-section">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-chart-line me-2"></i>Results & Analytics</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Competition Results Overview</h6>
                                </div>
                                <div class="card-body">
                                    <canvas id="resultsChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Top Performing Colleges</h6>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <div class="list-group-item d-flex justify-content-between">
                                            <span>ABC College</span>
                                            <span class="badge bg-primary">5 Gold</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between">
                                            <span>XYZ University</span>
                                            <span class="badge bg-primary">3 Gold</span>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between">
                                            <span>LMN Institute</span>
                                            <span class="badge bg-primary">2 Gold</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Settings Section -->
        <div id="settings" class="dashboard-section">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fas fa-cog me-2"></i>System Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>General Settings</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input type="text" class="form-control" value="UniFest 2026">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Max Participants per College</label>
                                            <input type="number" class="form-control" value="50">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Registration Deadline</label>
                                            <input type="date" class="form-control" value="2026-03-15">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Security Settings</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Admin Password</label>
                                            <input type="password" class="form-control" placeholder="Enter new password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Session Timeout (minutes)</label>
                                            <input type="number" class="form-control" value="30">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="twoFactor" checked>
                                            <label class="form-check-label" for="twoFactor">Enable Two-Factor Authentication</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Security</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Add College Modal -->
    <div class="modal fade" id="addCollegeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New College</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addCollegeForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">College Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">College Code</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add College</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Competition Modal -->
    <div class="modal fade" id="addCompetitionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Competition</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addCompetitionForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Competition Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="technical">Technical</option>
                                    <option value="cultural">Cultural</option>
                                    <option value="sports">Sports</option>
                                    <option value="academic">Academic</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Max Participants</label>
                                <input type="number" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Schedule Date</label>
                                <input type="datetime-local" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">Create Competition</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Section Navigation
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.dashboard-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Update active nav link
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`[data-section="${sectionId}"]`).classList.add('active');
            
            // Update page title
            const pageTitle = document.getElementById('pageTitle');
            const sectionTitles = {
                'dashboard': 'Admin Dashboard',
                'colleges': 'Manage Colleges',
                'competitions': 'Manage Competitions',
                'judges': 'Manage Judges',
                'stage-controllers': 'Stage Controllers',
                'results': 'Results & Analytics',
                'settings': 'System Settings'
            };
            pageTitle.innerHTML = `<i class="fas fa-graduation-cap me-2"></i>${sectionTitles[sectionId]}`;
        }

        // Initialize navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Set up nav link click events
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const section = this.getAttribute('data-section');
                    showSection(section);
                });
            });

            // Initialize chart
            const ctx = document.getElementById('resultsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Technical', 'Cultural', 'Sports', 'Academic'],
                    datasets: [{
                        label: 'Participants',
                        data: [120, 85, 65, 72],
                        backgroundColor: [
                            'rgba(52, 152, 219, 0.8)',
                            'rgba(46, 204, 113, 0.8)',
                            'rgba(155, 89, 182, 0.8)',
                            'rgba(241, 196, 15, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Participants by Competition Category'
                        }
                    }
                }
            });

            // Form submissions
            document.getElementById('addJudgeForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Judge added successfully!');
                this.reset();
            });

            document.getElementById('addStageControllerForm').addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Stage Controller added successfully!');
                this.reset();
            });
        });
    </script>
</body>
</html> and this is new <?php
$conn = new mysqli("localhost", "root", "", "unifest_db");
$r = $conn->query("SELECT status FROM registration_settings WHERE id = 1");
$row = $r->fetch_assoc();
$registrationStatus = $row['status'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniFest 2026 - Super Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2C3E50;
            --secondary: #E74C3C;
            --accent: #F39C12;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--primary);
        }
        
        .navbar {
            background-color: var(--primary);
        }
        
        .sidebar {
            background: var(--primary);
            color: white;
            height: 100vh;
            position: fixed;
            width: 250px;
            padding-top: 20px;
        }
        
        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
        }
        
        .nav-link.active {
            background-color: var(--secondary);
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            border-left: 4px solid var(--secondary);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--secondary);
        }
        
        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .card-label {
            color: #6c757d;
            font-weight: 500;
        }
        
        .section-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent);
        }
        
        .form-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }
        
        .btn-primary {
            background-color: var(--secondary);
            border-color: var(--secondary);
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        
        .btn-success {
            background-color: #27AE60;
            border-color: #27AE60;
            font-weight: 600;
        }
        
        .btn-warning {
            background-color: #F39C12;
            border-color: #F39C12;
            font-weight: 600;
        }
        
        .participant-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-left: 3px solid var(--info);
        }
        
        .judge-inputs {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .judge-input {
            flex: 1;
        }
        
        .total-score {
            background: var(--success);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 10px;
            display: inline-block;
        }
        
        .college-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .login-info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            font-family: monospace;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .registration-control {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-left: 4px solid #F39C12;
        }
        
        .status-indicator {
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .status-open {
            background-color: rgba(39, 174, 96, 0.1);
            color: #27AE60;
        }
        
        .status-closed {
            background-color: rgba(231, 76, 60, 0.1);
            color: #E74C3C;
        }
       
    </style>
</head>
<body>
<?php include 'superadmin_sidebar.php'; ?> 

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Tab -->
        <div class="tab-content active" id="dashboard">
            <h2 class="section-title">Dashboard Overview</h2>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="card-value">12</div>
                        <div class="card-label">Active Competitions</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="card-value">18</div>
                        <div class="card-label">Colleges Registered</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-value">245</div>
                        <div class="card-label">Total Participants</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboard-card">
                        <div class="card-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-value">8</div>
                        <div class="card-label">Results Published</div>
                    </div>
                </div>
            </div>
            
            <!-- Registration Status Card -->
            <div class="registration-control">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-1">College Registration Status</h4>
                        <p class="mb-0 text-muted">Control whether colleges can register for UniFest 2026</p>
                    </div>
                    <div id="registrationStatus" class="status-indicator status-open">
                        <i class="fas fa-door-open me-2"></i>Registration OPEN
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success me-2" id="openRegistration">
                        <i class="fas fa-door-open me-2"></i>Open Registration
                    </button>
                    <button class="btn btn-warning" id="closeRegistration">
                        <i class="fas fa-door-closed me-2"></i>Close Registration
                    </button>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-card">
                        <h4 class="section-title">Quick Actions</h4>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary mb-2" data-tab="markEntry">
                                <i class="fas fa-clipboard-check me-2"></i>Enter Marks
                            </button>
                            <button class="btn btn-outline-primary mb-2" data-tab="colleges">
                                <i class="fas fa-university me-2"></i>Add College
                            </button>
                            <button class="btn btn-outline-primary mb-2" data-tab="competitions">
                                <i class="fas fa-plus me-2"></i>Create Competition
                            </button>
                            <button class="btn btn-outline-primary" data-tab="registration">
                                <i class="fas fa-user-plus me-2"></i>Registration Control
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-card">
                        <h4 class="section-title">Recent Activity</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                <i class="fas fa-check text-success me-2"></i>
                                Marks entered for Classical Singing
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-university text-info me-2"></i>
                                New college "Tech Institute" registered
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-trophy text-warning me-2"></i>
                                Dance competition results published
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-plus text-primary me-2"></i>
                                New competition "Robotics" created
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-door-closed text-danger me-2"></i>
                                College registration closed by Admin
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mark Entry Tab -->
        <div class="tab-content" id="markEntry">
            <h2 class="section-title">Enter Competition Marks</h2>
            
            <div class="form-card">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select Competition</label>
                        <select class="form-select" id="competitionSelect">
                            <option value="">-- Choose Competition --</option>
                            <option value="singing">Classical Singing</option>
                            <option value="dance">Dance Solo</option>
                            <option value="debate">Debate Competition</option>
                            <option value="programming">Programming Contest</option>
                            <option value="art">Art Competition</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Select College</label>
                        <select class="form-select" id="collegeSelect">
                            <option value="">-- Choose College --</option>
                            <option value="cityarts">City Arts College</option>
                            <option value="utech">University of Technology</option>
                            <option value="metro">Metropolitan University</option>
                            <option value="northern">Northern State College</option>
                        </select>
                    </div>
                </div>
                
                <div id="participantsContainer">
                    <!-- Participants will be loaded here based on competition and college selection -->
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-users fa-2x mb-3"></i>
                        <p>Select a competition and college to view participants</p>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" id="saveMarksBtn">
                        <i class="fas fa-save me-2"></i>Save All Marks
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Manage Colleges Tab -->
<!-- Manage Colleges Tab -->
<div class="tab-content" id="colleges">
    <h2 class="section-title">Manage Colleges</h2>

    <div class="form-card">
        <h4 class="mb-4">Add New College</h4>

        <form action="add_college.php" method="POST">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">College Name</label>
                    <input type="text" class="form-control" name="college_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">College Code</label>
                    <input type="text" class="form-control" name="college_code" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Email</label>
                    <input type="email" class="form-control" name="college_email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contact Person</label>
                    <input type="text" class="form-control" name="contact_person" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add College & Generate Login
            </button>

        </form>

        <div id="collegeLoginInfo" class="mt-3" style="display: none;">
            <h5 class="text-success">College Added Successfully!</h5>
            <div class="login-info">
                <strong>Username:</strong> <span id="generatedUsername"></span><br>
                <strong>Password:</strong> <span id="generatedPassword"></span>
            </div>
            <p class="text-muted mt-2">Share these credentials with the college admin</p>
        </div>
    </div>

    <div class="form-card mt-4">
        <h4 class="mb-4">Registered Colleges</h4>

        <!-- Sample cards (later dynamic) -->
        <div class="college-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">City Arts College</h5>
                    <p class="mb-1 text-muted">Code: CAC | Email: admin@cityarts.edu</p>
                </div>
                <span class="badge bg-success">Active</span>
            </div>
        </div>

        <div class="college-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">University of Technology</h5>
                    <p class="mb-1 text-muted">Code: UOT | Email: admin@utech.edu</p>
                </div>
                <span class="badge bg-success">Active</span>
            </div>
        </div>

    </div>
</div>

                <div id="collegeLoginInfo" class="mt-3" style="display: none;">
                    <h5 class="text-success">College Added Successfully!</h5>
                    <div class="login-info">
                        <strong>Username:</strong> <span id="generatedUsername"></span><br>
                        <strong>Password:</strong> <span id="generatedPassword"></span>
                    </div>
                    <p class="text-muted mt-2">Share these credentials with the college admin</p>
                </div>
            </div>
            
            <div class="form-card mt-4">
                <h4 class="mb-4">Registered Colleges</h4>
                <div class="college-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">City Arts College</h5>
                            <p class="mb-1 text-muted">Code: CAC | Email: admin@cityarts.edu</p>
                        </div>
                        <span class="badge bg-success">Active</span>
                    </div>
                </div>
                <div class="college-card">
                    <div class="d-flex justify-content-between align-items-center">
                         <div>
                            <h5 class="mb-1">University of Technology</h5>
                            <p class="mb-1 text-muted">Code: UOT | Email: admin@utech.edu</p>
                        </div>
                        <span class="badge bg-success">Active</span>
                    </div>
                </div>
                <div class="college-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Metropolitan University</h5>
                            <p class="mb-1 text-muted">Code: MET | Email: admin@metro.edu</p>
                        </div>
                        <span class="badge bg-success">Active</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Competitions Tab -->
        <div class="tab-content" id="competitions">
            <h2 class="section-title">Manage Competitions</h2>
            
            <div class="form-card">
                <h4 class="mb-4">Create New Competition</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Competition Name</label>
                        <input type="text" class="form-control" id="competitionName" placeholder="Enter competition name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" id="competitionCategory">
                            <option value="cultural">Cultural</option>
                            <option value="technical">Technical</option>
                            <option value="literary">Literary</option>
                            <option value="sports">Sports</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Max Participants per College</label>
                        <input type="number" class="form-control" id="maxParticipants" value="2" min="1">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judges Count</label>
                        <select class="form-select" id="judgesCount">
                            <option value="3">3 Judges</option>
                            <option value="4">4 Judges</option>
                            <option value="5">5 Judges</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="createCompetitionBtn">
                    <i class="fas fa-plus me-2"></i>Create Competition
                </button>
            </div>
            
            <div class="form-card mt-4">
                <h4 class="mb-4">Active Competitions</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Competition</th>
                                <th>Category</th>
                                <th>Participants</th>
                                <th>Judges</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Classical Singing</td>
                                <td>Cultural</td>
                                <td>24</td>
                                <td>4</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>Dance Solo</td>
                                <td>Cultural</td>
                                <td>18</td>
                                <td>4</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>Programming Contest</td>
                                <td>Technical</td>
                                <td>16</td>
                                <td>3</td>
                                <td><span class="badge bg-warning">Upcoming</span></td>
                            </tr>
                            <tr>
                                <td>Debate Competition</td>
                                <td>Literary</td>
                                <td>12</td>
                                <td>3</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Registration Control Tab -->
        <div class="tab-content" id="registration">
            <h2 class="section-title">Registration Control</h2>
            
            <div class="form-card">
                <h4 class="mb-4">College Registration Settings</h4>
                
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 me-3">Current Status:</h5>
                            <div id="registrationStatusFull" class="status-indicator status-open">
                                <i class="fas fa-door-open me-2"></i>Registration OPEN for Colleges
                            </div>
                        </div>
                        <p class="text-muted mt-2">
                            When registration is closed, new colleges cannot register for UniFest 2026.
                            Existing colleges can still access their accounts and manage participants.
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light p-4">
                            <h5><i class="fas fa-door-open text-success me-2"></i>Open Registration</h5>
                            <p class="text-muted">Allow new colleges to register for UniFest 2026</p>
                            <button class="btn btn-success w-100" id="openRegistrationFull">
                                <i class="fas fa-check me-2"></i>Open Registration
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light p-4">
                            <h5><i class="fas fa-door-closed text-danger me-2"></i>Close Registration</h5>
                            <p class="text-muted">Stop new colleges from registering</p>
                            <button class="btn btn-warning w-100" id="closeRegistrationFull">
                                <i class="fas fa-times me-2"></i>Close Registration
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-3 bg-light rounded">
                    <h6><i class="fas fa-info-circle me-2"></i>Registration Statistics</h6>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="fw-bold fs-4">18</div>
                                <div class="text-muted">Colleges Registered</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="fw-bold fs-4">5</div>
                                <div class="text-muted">Pending Approvals</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="fw-bold fs-4">2</div>
                                <div class="text-muted">This Week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Registration status management
        let registrationOpen = <?= $registrationStatus === 'open' ? 'true' : 'false'; ?>;

        
        // Update registration status display
        function updateRegistrationStatus() {
            const statusIndicator = document.getElementById('registrationStatus');
            const statusIndicatorFull = document.getElementById('registrationStatusFull');
            
            if (registrationOpen) {
                statusIndicator.className = 'status-indicator status-open';
                statusIndicator.innerHTML = '<i class="fas fa-door-open me-2"></i>Registration OPEN';
                statusIndicatorFull.className = 'status-indicator status-open';
                statusIndicatorFull.innerHTML = '<i class="fas fa-door-open me-2"></i>Registration OPEN for Colleges';
            } else {
                statusIndicator.className = 'status-indicator status-closed';
                statusIndicator.innerHTML = '<i class="fas fa-door-closed me-2"></i>Registration CLOSED';
                statusIndicatorFull.className = 'status-indicator status-closed';
                statusIndicatorFull.innerHTML = '<i class="fas fa-door-closed me-2"></i>Registration CLOSED for Colleges';
            }
        }
        
       // Open registration (DATABASE)
document.getElementById('openRegistration').addEventListener('click', function() {
    updateStatusDB('open');
});

document.getElementById('openRegistrationFull').addEventListener('click', function() {
    updateStatusDB('open');
});

// Close registration (DATABASE)
document.getElementById('closeRegistration').addEventListener('click', function() {
    if (confirm('Are you sure you want to close college registration? New colleges will not be able to register.')) {
        updateStatusDB('closed');
    }
});

document.getElementById('closeRegistrationFull').addEventListener('click', function() {
    if (confirm('Are you sure you want to close college registration? New colleges will not be able to register.')) {
        updateStatusDB('closed');
    }
});

        
        // Tab navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links and tabs
                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // Add active class to clicked link and corresponding tab
                this.classList.add('active');
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Quick action buttons navigation
        document.querySelectorAll('button[data-tab]').forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Remove active class from all links and tabs
                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // Add active class to corresponding link and tab
                document.querySelector(`.nav-link[data-tab="${tabId}"]`).classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Generate college login credentials
        document.getElementById('addCollegeBtn').addEventListener('click', function() {
            const collegeName = document.getElementById('collegeName').value;
            const collegeCode = document.getElementById('collegeCode').value;
            
            if (!collegeName || !collegeCode) {
                alert('Please enter college name and code');
                return;
            }
            
            // Generate username and password
            const username = collegeCode.toLowerCase() + '_admin';
            const password = generatePassword(8);
            
            // Display login info
            document.getElementById('generatedUsername').textContent = username;
            document.getElementById('generatedPassword').textContent = password;
            document.getElementById('collegeLoginInfo').style.display = 'block';
            
            // Clear form
            document.getElementById('collegeName').value = '';
            document.getElementById('collegeCode').value = '';
            document.getElementById('collegeEmail').value = '';
            document.getElementById('contactPerson').value = '';
        });
        
        // Generate random password
        function generatePassword(length) {
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";
            for (let i = 0; i < length; i++) {
                password += charset.charAt(Math.floor(Math.random() * charset.length));
            }
            return password;
        }
        
        // Load participants when competition and college are selected
        document.getElementById('competitionSelect').addEventListener('change', loadParticipants);
        document.getElementById('collegeSelect').addEventListener('change', loadParticipants);
        
        function loadParticipants() {
            const competition = document.getElementById('competitionSelect').value;
            const college = document.getElementById('collegeSelect').value;
            
            if (!competition || !college) return;
            
            // Sample participants data
            const participants = {
                'singing': [
                    { name: 'Priya Sharma', code: 'CS-12' },
                    { name: 'Rahul Kumar', code: 'CS-15' }
                ],
                'dance': [
                    { name: 'Ananya Desai', code: 'DS-08' },
                    { name: 'Rohit Verma', code: 'DS-11' }
                ],
                'debate': [
                    { name: 'Aditya Singh', code: 'DB-05' },
                    { name: 'Neha Gupta', code: 'DB-09' }
                ],
                'programming': [
                    { name: 'Vikram Reddy', code: 'PC-03' },
                    { name: 'Sneha Patel', code: 'PC-07' }
                ],
                'art': [
                    { name: 'Meera Joshi', code: 'AR-10' },
                    { name: 'Sanjay Mehta', code: 'AR-14' }
                ]
            };
            
            const container = document.getElementById('participantsContainer');
            container.innerHTML = '';
            
            if (participants[competition]) {
                participants[competition].forEach(participant => {
                    const participantCard = document.createElement('div');
                    participantCard.className = 'participant-card';
                    participantCard.innerHTML = `
                        <h5>${participant.name} <span class="text-muted">(${participant.code})</span></h5>
                        <div class="judge-inputs">
                            <div class="judge-input">
                                <label class="form-label">Judge 1</label>
                                <input type="number" class="form-control judge-mark" min="0" max="25" placeholder="0-25">
                            </div>
                            <div class="judge-input">
                                <label class="form-label">Judge 2</label>
                                <input type="number" class="form-control judge-mark" min="0" max="25" placeholder="0-25">
                            </div>
                            <div class="judge-input">
                                <label class="form-label">Judge 3</label>
                                <input type="number" class="form-control judge-mark" min="0" max="25" placeholder="0-25">
                            </div>
                            <div class="judge-input">
                                <label class="form-label">Judge 4</label>
                                <input type="number" class="form-control judge-mark" min="0" max="25" placeholder="0-25">
                            </div>
                        </div>
                        <div class="total-score">Total: <span>0</span>/100</div>
                    `;
                    container.appendChild(participantCard);
                    
                    // Add event listeners to calculate total
                    const judgeInputs = participantCard.querySelectorAll('.judge-mark');
                    const totalSpan = participantCard.querySelector('.total-score span');
                    
                    judgeInputs.forEach(input => {
                        input.addEventListener('input', function() {
                            let total = 0;
                            judgeInputs.forEach(judgeInput => {
                                total += parseInt(judgeInput.value) || 0;
                            });
                            totalSpan.textContent = total;
                        });
                    });
                });
            }
        }
        
        // Save marks
        document.getElementById('saveMarksBtn').addEventListener('click', function() {
            alert('Marks saved successfully!');
        });
        
        // Create competition
        document.getElementById('createCompetitionBtn').addEventListener('click', function() {
            const competitionName = document.getElementById('competitionName').value;
            
            if (!competitionName) {
                alert('Please enter competition name');
                return;
            }
            
            alert(`Competition "${competitionName}" created successfully!`);
            document.getElementById('competitionName').value = '';
        });
        
        // Show alert message
        function showAlert(message, type) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-warning';
            
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.querySelector('.main-content').prepend(alertDiv);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }
        
        // Initialize registration status
        function updateStatusDB(status) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_registration.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        registrationOpen = status === 'open';
        updateRegistrationStatus();
        showAlert("Registration " + status.toUpperCase(), "success");
    };

    xhr.send("status=" + status);
}

document.getElementById('openRegistration').onclick = () => updateStatusDB('open');
document.getElementById('openRegistrationFull').onclick = () => updateStatusDB('open');

document.getElementById('closeRegistration').onclick = () => {
    if (confirm('Close registration?')) updateStatusDB('closed');
};

document.getElementById('closeRegistrationFull').onclick = () => {
    if (confirm('Close registration?')) updateStatusDB('closed');
};
// Load status from database on page load
updateRegistrationStatus();





    </script>
</body>
</html> the issue consists mainly on competions tab and registration control tab
