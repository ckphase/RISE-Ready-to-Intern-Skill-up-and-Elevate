<?php
session_start();


// PROCESS LOGIN FIRST
if (isset($_POST['login'])) {
    include('../dbms/connection.php');

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'student') {
            header("Location: ../student/studentpanel.php?id=" . $user['id']);
            exit();
        } elseif ($user['role'] == 'company') {
            header("Location: ../company/company.php?id=" . $user['id']);
            exit();
        }
        elseif ($user['role'] == 'admin') {
            header("Location: ../admin/adminDashboard.php?id=" . $user['id']);
            exit();
        } else {
            echo "Unknown role.";
        }
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }

    mysqli_close($db);
}
?>



<?php
include('../landing/header.php');
?>

<!-- Login UI -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login Here</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
            </ol>
        </nav>
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
                                <input type="email" class="form-control" id="email" placeholder="Your Email" name="userEmail" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="userPassword" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    <a href="signIn.php">Click Here To Sign-Up</a>
                </h6>
            </div>
        </div>
    </div>
</div>


<?php include('../landing/footer.php'); ?>
