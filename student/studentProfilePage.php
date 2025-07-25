<?php
session_start();

if (isset($_GET['id'])) {
    $_SESSION['student_id'] = intval($_GET['id']);
}

if (!isset($_SESSION['student_id'])) {
    // Redirect if ID is missing
    header("Location: companyLogin.php");
    exit();
}

$student_id = $_SESSION['student_id'];
include("studentheader.php");
include('../dbms/connection.php');

// Initialize variables
$name = $email = $phone = $resume_path = $student_id = $skills = $experience = $portfolio = $linkedin = $gpa = $year = "";

// ✅ Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $gpa        = $_POST['gpa'];
    $skills     = $_POST['skills'];
    $experience = $_POST['experience'];
    $portfolio  = $_POST['portfolio'];
    $linkedin   = $_POST['linkedin'];
    $year       = $_POST['year'];
    $student_id = $_POST['student_id'];

    // ✅ Resume Upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
        $upload_dir = '../uploads/';
        $resume_name = basename($_FILES['resume']['name']);
        $resume_path = $upload_dir . time() . '_' . $resume_name;
        move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path);
    }

    // ✅ Update `users` table
    $updateUser = $db->prepare("UPDATE users SET name = ?, email = ?, contact = ? WHERE id = ?");
    $updateUser->bind_param("sssi", $name, $email, $phone, $user_id);
    $updateUser->execute();

    // ✅ Check if student entry exists
    $checkStudent = $db->prepare("SELECT id FROM students WHERE user_id = ?");
    $checkStudent->bind_param("i", $user_id);
    $checkStudent->execute();
    $result = $checkStudent->get_result();

    if ($result->num_rows > 0) {
        // ✅ Update existing student
        $updateStudent = $db->prepare("UPDATE students SET resume_path = ?, student_id = ? WHERE user_id = ?");
        $updateStudent->bind_param("ssi", $resume_path, $student_id, $user_id);
        $updateStudent->execute();
    } else {
        // ✅ Insert new student entry
        $insertStudent = $db->prepare("INSERT INTO students (user_id, resume_path, student_id) VALUES (?, ?, ?)");
        $insertStudent->bind_param("iss", $user_id, $resume_path, $student_id);
        $insertStudent->execute();
    }

    echo "<div class='alert alert-success text-center'>Profile updated successfully!</div>";
}

// ✅ Fetch Existing Profile Data
$query = "SELECT users.*, students.resume_path, students.student_id 
          FROM users 
          LEFT JOIN students ON users.id = students.user_id 
          WHERE users.id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $name        = $row['name'];
    $email       = $row['email'];
    $phone       = $row['contact'];
    $resume_path = $row['resume_path'];
    $student_id  = $row['student_id'];
}
?>

<!-- ✅ UI Section -->
<div class="container-fluid text-white" style="
    background: rgba(136, 211, 238, 1);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top:40px;
    padding-bottom:40px;">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black">Your Profile and Details</h2>
                <h4 class="mb-0 text-light">RISE Profile Page</h4>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Form -->
<div class="container my-5">
    <h2 class="mb-4">My Profile</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-user me-2"></i>Profile Information</h5>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($name) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($phone) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Student ID</label>
                            <input type="text" class="form-control" name="student_id" value="<?= htmlspecialchars($student_id) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Year of Study</label>
                            <select class="form-select" name="year">
                                <option value="">Select Year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                                <option value="graduate">Graduate</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">GPA</label>
                            <input type="number" step="0.01" min="0" max="4" class="form-control" name="gpa" value="<?= htmlspecialchars($gpa) ?>">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Skills</label>
                            <textarea class="form-control" name="skills" rows="3"><?= htmlspecialchars($skills) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Previous Experience</label>
                            <textarea class="form-control" name="experience" rows="4"><?= htmlspecialchars($experience) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Resume</label>
                            <input type="file" class="form-control" name="resume" accept=".pdf,.doc,.docx">
                            <?php if (!empty($resume_path)): ?>
                                <div class="form-text">Current: <?= basename($resume_path) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Portfolio URL</label>
                            <input type="url" class="form-control" name="portfolio" value="<?= htmlspecialchars($portfolio) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">LinkedIn Profile</label>
                            <input type="url" class="form-control" name="linkedin" value="<?= htmlspecialchars($linkedin) ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Save Profile
                </button>
            </form>
        </div>
    </div>
</div>

<?php include('studentfooter.php'); ?>
