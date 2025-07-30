<?php
session_start();

// Turn on error reporting (for debugging only — remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Handle login submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    require_once('../dbms/connection.php');

    // Check connection
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($db, $_POST['userEmail']);
    $password = $_POST['userPassword'];

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $id = $user['id'];

            // Redirect by role
            if ($user['role'] === 'student') {
                header("Location: ../student/studentpanel.php?id=$id");
            } elseif ($user['role'] === 'company') {
                header("Location: ../company/company.php?id=$id");
            } elseif ($user['role'] === 'admin') {
                header("Location: ../admin/adminDashboard.php?id=$id");
            } else {
                echo "<script>alert('Unknown user role.'); window.location.href='login.php';</script>";
            }
            exit;
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href='login.php';</script>";
    }

    mysqli_close($db);
}
?>

<?php include('header.php'); ?>

<!-- UI Section -->
<div class="container-xxl bg-dark page-header mb-5" style="padding-left: 60px; background: url('../img/landing-2.avif') no-repeat center center fixed;background-size: cover;">
    <div class="my-5 pt-5 pb-4">
          <h1 class="display-5 fw-bold">Login Page</h1>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Login Form</h6>
            <h1 class="mb-5">Login to Your Account Here</h1>
        </div>

        <div class="row g-4 d-flex justify-content-center">
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form method="post" action="">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="userEmail" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="userPassword" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center wow fadeInUp mt-4" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    <a href="signIn.php">Click Here To Sign-Up</a>
                </h6>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
