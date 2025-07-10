<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RISE Admin Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome (for dashboard icons, not navbar) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Heebo', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand h1 {
      font-family: 'Inter', sans-serif;
      font-weight: 800;
      color: #0d6efd;
      margin: 0;
    }

    .nav-link {
      font-weight: 500;
      color: #333;
    }

    .nav-link.active,
    .nav-link:hover,
    .dropdown-item:hover {
      color: #0d6efd !important;
    }

    .dropdown-menu {
      border-radius: 0;
    }

    .content-section {
      display: none;
      padding: 40px;
    }

    .content-section.active {
      display: block;
    }
  </style>
</head>
<body>
  <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-top p-0">
    <div class="container-fluid px-4">
        <a class="navbar-brand py-3" href="#">
            <h1>RISE Admin</h1>
        </a>
        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto p-3 p-lg-0">
                <a class="nav-link active" href="#dashboard" onclick="showSection('dashboard')">Dashboard</a>
                <a class="nav-link" href="#companies" onclick="showSection('companies')">Approve Companies</a>
                <a class="nav-link" href="#accounts" onclick="showSection('accounts')">Account Management</a>

                <!-- More Dropdown -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">More</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a class="dropdown-item" href="#internships" onclick="showSection('internships')">Manage Internships</a>
                        <a class="dropdown-item" href="#applications" onclick="showSection('applications')">Applications</a>
                        <a class="dropdown-item" href="#announcements" onclick="showSection('announcements')">Announcements</a>
                        <a class="dropdown-item" href="#allCategory" onclick="showSection('allCategory')">All Users</a>
                        <a class="dropdown-item" href="#">Settings</a>
                    </div>
                </div>

                

                <!-- Logout Button -->
                 </div>
                <a href="logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block my-2">
    Logout <i class="fa fa-arrow-right ms-3"></i>
</a>

            </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
