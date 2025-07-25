<?php
session_start();
include('studentheader.php');
include('../dbms/connection.php');

if (!isset($_SESSION['student_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$profile = [];
$user = [];

// Fetch user (from users table)
$userQuery = "SELECT * FROM users WHERE id = $student_id";
$userResult = mysqli_query($db, $userQuery);
if ($userResult && mysqli_num_rows($userResult) > 0) {
    $user = mysqli_fetch_assoc($userResult);
}

// Fetch profile (from student_profiles)
$profileQuery = "SELECT * FROM students WHERE user_id = $student_id";
$profileResult = mysqli_query($db, $profileQuery);
if ($profileResult && mysqli_num_rows($profileResult) > 0) {
    $profile = mysqli_fetch_assoc($profileResult);
}
?>

<div class="container my-5">
    <h3 class="mb-4">My Profile</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- User Info -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?? '' ?>" required>
            </div>
        </div>

        <!-- Profile Info -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Year of Study</label>
                <input type="text" name="year_of_study" class="form-control" value="<?= $profile['year_of_study'] ?? '' ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">GPA</label>
                <input type="number" name="gpa" class="form-control" value="<?= $profile['gpa'] ?? '' ?>" step="0.01">
            </div>
            <div class="col-md-4">
                <label class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" value="<?= $user['contact'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Skills</label>
            <textarea name="skills" class="form-control" rows="2"><?= $profile['skills'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Experience</label>
            <textarea name="experience" class="form-control" rows="2"><?= $profile['experience'] ?? '' ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin_id" class="form-control" value="<?= $profile['linkedin_id'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Portfolio Link</label>
                <input type="url" name="portfolio" class="form-control" value="<?= $profile['portfolio'] ?? '' ?>">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Resume (PDF)</label>
            <input type="file" name="resume" class="form-control">
            <?php if (!empty($profile['resume'])): ?>
                <small>Current: <a href="<?= $profile['resume'] ?>" target="_blank">View Resume</a></small>
            <?php endif; ?>
        </div>

        <button type="submit" name="update_profile" class="btn btn-primary mt-2">Update Profile</button>
    </form>
</div>

<?php
// Handle form submission
if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $year_of_study = $_POST['year_of_study'];
    $gpa = $_POST['gpa'];
    $contact = $_POST['contact'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $portfolio = $_POST['portfolio'];
    $linkedin_id = $_POST['linkedin_id'];
    $resume_path = $profile['resume'] ?? '';

    // Handle file upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
        $target_dir = "../uploads/resumes/";
        $file_name = time() . '_' . basename($_FILES["resume"]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
            $resume_path = $target_file;
        }
    }

    // Update users table
    $updateUser = "UPDATE users SET name='$name', email='$email', contact='$contact' WHERE id=$student_id";
    mysqli_query($db, $updateUser);

    // Check if student profile exists
    $checkProfile = mysqli_query($db, "SELECT * FROM students WHERE user_id = $student_id");
    if (mysqli_num_rows($checkProfile) > 0) {
        // Update existing
        $updateProfile = "UPDATE students SET year_of_study='$year_of_study', gpa=$gpa, skills='$skills', 
                          experience='$experience', portfolio='$portfolio', linkedin_id='$linkedin_id', resume='$resume_path' 
                          WHERE user_id = $student_id";
    } else {
        // Insert new
        $updateProfile = "INSERT INTO students (user_id, year_of_study, gpa, skills, experience, portfolio, linkedin_id, resume) 
                          VALUES ($student_id, '$year_of_study', $gpa, '$skills', '$experience', '$portfolio', '$linkedin_id', '$resume_path')";
    }

    if (mysqli_query($db, $updateProfile)) {
        echo "<script>alert('Profile updated successfully'); window.location.href='studentProfilePage.php';</script>";
    } else {
        echo "<script>alert('Error updating profile');</script>";
    }
}
include('studentfooter.php');
?>
