<?php
include('header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    include('connection.php');
    if (!$db) die("Connection failed: " . mysqli_connect_error());

    $formType = $_POST['formType'];
    $name = $formType === 'student' ? $_POST['studentName'] : $_POST['companyName'];
    $email = $formType === 'student' ? $_POST['studentEmail'] : $_POST['companyEmail'];
    $contact = $formType === 'student' ? $_POST['course'] : $_POST['fields'];
    $password = password_hash($_POST[$formType . 'Password'], PASSWORD_DEFAULT);
    $role = $formType;
    $status = 'active';

    $stmt = mysqli_prepare($db, "INSERT INTO users (name, email, password, contact, role, status, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $password, $contact, $role, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Account created successfully as $role!');</script>";
    } else {
        echo "<script>alert('Email already exists or error occurred.');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
?>

<!-- Header Section -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Sign Up</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Sign Up Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Sign Up</h6>
            <h1 class="mb-5">Create An Account Today</h1>
        </div>

        <!-- Toggle Buttons -->
        <div class="d-flex justify-content-center mb-4">
            <button id="studentBtn" class="btn btn-outline-primary me-2">Student</button>
            <button id="companyBtn" class="btn btn-outline-secondary">Company</button>
        </div>

        <!-- Forms -->
        <div class="row g-4 d-flex justify-content-center">
            <!-- Student Form -->
            <div class="col-lg-6 col-md-12" id="studentForm" style="display: block;">
                <form method="post">
                    <input type="hidden" name="formType" value="student" required>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="studentName" placeholder="Full Name" required>
                                <label>Full Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="studentEmail" placeholder="Email" required>
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="university" placeholder="University" required>
                                <label>University</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="course" placeholder="Course" required>
                                <label>Course</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="studentPassword" placeholder="Password" required>
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Sign Up as Student</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Company Form -->
            <div class="col-lg-6 col-md-12" id="companyForm" style="display: none;">
                <form method="post">
                    <input type="hidden" name="formType" value="company">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="companyName" placeholder="Company Name" >
                                <label>Company Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="companyEmail" placeholder="Email" required>
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="location" placeholder="Location">
                                <label>Location</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="fields" placeholder="Industry/Field" required>
                                <label>Industry / Field</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="companyPassword" placeholder="Password" required>
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-secondary w-100 py-3" name="submit" type="submit">Sign Up as Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Already have an account -->
        <div class="text-center mt-4">
            <h6 class="section-title bg-white text-primary px-3">
                <a href="login.php">Already have an account?</a>
            </h6>
        </div>
    </div>
</div>

<!-- Toggle Script -->
<script>
    const studentBtn = document.getElementById('studentBtn');
    const companyBtn = document.getElementById('companyBtn');
    const studentForm = document.getElementById('studentForm');
    const companyForm = document.getElementById('companyForm');

    studentBtn.addEventListener('click', () => {
        studentForm.style.display = 'block';
        companyForm.style.display = 'none';
        studentBtn.classList.add('btn-primary');
        studentBtn.classList.remove('btn-outline-primary');
        companyBtn.classList.remove('btn-secondary');
        companyBtn.classList.add('btn-outline-secondary');
    });

    companyBtn.addEventListener('click', () => {
        studentForm.style.display = 'none';
        companyForm.style.display = 'block';
        companyBtn.classList.add('btn-secondary');
        companyBtn.classList.remove('btn-outline-secondary');
        studentBtn.classList.remove('btn-primary');
        studentBtn.classList.add('btn-outline-primary');
    });
</script>

<?php include('footer.php'); ?>
