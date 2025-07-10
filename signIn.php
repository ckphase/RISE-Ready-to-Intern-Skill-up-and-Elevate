<?php include('header.php'); ?>

<!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

<!-- Sign Up Start -->
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
                <form method="post" action="">
                    <input type="hidden" name="formType" value="student">
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
                                <label>User Id</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="course" placeholder="Course" required>
                                <label>Contact</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="studentPassword" placeholder="Password" required>
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="File" class="form-control" name="studentPassword" placeholder="Password" required>
                                <label>Resume</label>
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
                <form method="post" action="">
                    <input type="hidden" name="formType" value="company">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="companyName" placeholder="Company Name" required>
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
                                <input type="text" class="form-control" name="location" placeholder="Location" required>
                                <label>User ID</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="fields" placeholder="Industry/Field" required>
                                <label>Contact</label>
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

        <!-- Already have an account? -->
        <div class="text-center mt-4">
            <h6 class="section-title bg-white text-primary px-3"><a href="login.php">Already have an account?</a></h6>
        </div>
    </div>
</div>
<!-- Sign Up End -->

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

<?php
if (isset($_POST['submit'])) {
    $formType = $_POST['formType'];
    $db = mysqli_connect("localhost", "root", "", "rise");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($formType === 'student') {
        $name = $_POST["studentName"];
        $email = $_POST["studentEmail"];
        $university = $_POST["university"];
        $course = $_POST["course"];
        $password = password_hash($_POST["studentPassword"], PASSWORD_DEFAULT);
        $profile_completed = 0;

        $user_sql = "INSERT INTO users (email, password, role, created_at) VALUES (?, ?, 'student', NOW())";
        $stmt1 = mysqli_prepare($db, $user_sql);
        mysqli_stmt_bind_param($stmt1, "ss", $email, $password);

        if (mysqli_stmt_execute($stmt1)) {
            $user_id = mysqli_insert_id($db);
            $profile_sql = "INSERT INTO student_profiles (user_id, full_name, university_name, course_name, profile_completed, created_at) 
                            VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt2 = mysqli_prepare($db, $profile_sql);
            mysqli_stmt_bind_param($stmt2, "isssi", $user_id, $name, $university, $course, $profile_completed);

            if (mysqli_stmt_execute($stmt2)) {
                echo "<script>alert('Student account created successfully!');</script>";
            } else {
                echo "<script>alert('Failed to create student profile!');</script>";
            }
            mysqli_stmt_close($stmt2);
        } else {
            echo "<script>alert('Email already exists or error creating student user.');</script>";
        }
        mysqli_stmt_close($stmt1);
    }

    if ($formType === 'company') {
        $name = $_POST["companyName"];
        $email = $_POST["companyEmail"];
        $location = $_POST["location"];
        $fields = $_POST["fields"];
        $password = password_hash($_POST["companyPassword"], PASSWORD_DEFAULT);

        $user_sql = "INSERT INTO users (email, password, role, created_at) VALUES (?, ?, 'company', NOW())";
        $stmt1 = mysqli_prepare($db, $user_sql);
        mysqli_stmt_bind_param($stmt1, "ss", $email, $password);

        if (mysqli_stmt_execute($stmt1)) {
            $user_id = mysqli_insert_id($db);
            $profile_sql = "INSERT INTO company_profiles (user_id, company_name, location, industry_field, created_at) 
                            VALUES (?, ?, ?, ?, NOW())";
            $stmt2 = mysqli_prepare($db, $profile_sql);
            mysqli_stmt_bind_param($stmt2, "isss", $user_id, $name, $location, $fields);

            if (mysqli_stmt_execute($stmt2)) {
                echo "<script>alert('Company account created successfully!');</script>";
            } else {
                echo "<script>alert('Failed to create company profile!');</script>";
            }
            mysqli_stmt_close($stmt2);
        } else {
            echo "<script>alert('Email already exists or error creating company user.');</script>";
        }
        mysqli_stmt_close($stmt1);
    }

    mysqli_close($db);
}
?>

<?php include('footer.php'); ?>
