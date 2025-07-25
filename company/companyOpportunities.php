<?php
session_start();

if (isset($_GET['id'])) {
    $_SESSION['company_id'] = intval($_GET['id']);
}

if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("companyHeader.php");
include('../dbms/connection.php'); // This should define $conn

$message = "";
$cid = "";
// ✅ Step: Validate if company_id exists in companies table
$check = mysqli_query($db, "SELECT id FROM companies WHERE user_id = '$company_id'");
// echo $company_id;
$check = mysqli_query($db, "SELECT id FROM companies WHERE user_id = '$company_id'");

if ($check && mysqli_num_rows($check) > 0) {
    $row = mysqli_fetch_assoc($check);
    $selected_id = $row['id']; // 
}
// ahhhhhhhh phew done
if (mysqli_num_rows($check) == 0) {
    die("<div class='alert alert-danger'>Invalid company ID. No matching company found.</div>");
}

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $duration = $_POST['duration'];
    $stipend = $_POST['stipend'];
    $last_date = $_POST['last_date'];

    if (!empty($title) && !empty($description)) {
        $query = "INSERT INTO internships (company_id, title, description, location, duration, stipend, last_date) 
                  VALUES ('$selected_id', '$title', '$description', '$location', '$duration', '$stipend', '$last_date')";
        $result = mysqli_query($db, $query);

        if ($result) {
            $message = "<div class='alert alert-success'>Internship posted successfully!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error posting internship: " . mysqli_error($db) . "</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>Please fill in all required fields.</div>";
    }
}

// ✅ Fetch posted internships
$internships = [];
$fetch_query = "SELECT id, title FROM internships WHERE company_id = '$selected_id' ORDER BY created_at DESC";
$fetch_result = mysqli_query($db, $fetch_query);
if (mysqli_num_rows($fetch_result) > 0) {
    while ($row = mysqli_fetch_assoc($fetch_result)) {
        $internships[] = $row;
    }
}
?>

<div class="container-fluid text-white" style="background: rgba(136, 211, 238, 1); padding: 40px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.3);">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black" style="letter-spacing: 1px;">Post and Check Your Openings</h2>
                <h4 class="mb-0 text-light">RISE Post Opening Page</h4>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <?php echo $message; ?>

    <div class="row">
        <!-- Posted Trainings -->
        <div class="col-md-3 mb-4">
            <div class="card border-3 h-100">
                <div class="card-body">
                    <h4 class="card-title">Posted Trainings</h4>
                    <table class="table table-hover table-sm">
                        <thead><tr><th>Recently Opened</th></tr></thead>
                        <tbody>
                            <?php
                            if (!empty($internships)) {
                                foreach ($internships as $item) {
                                    echo "<tr><td>" . htmlspecialchars($item['title']) . "</td></tr>";
                                }
                            } else {
                                echo "<tr><td>No internships posted yet.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Form to Post Internship -->
        <div class="col-md-9">
            <div class="card border-3">
                <div class="card-body">
                    <h4 class="mb-3">Post a New Opportunity</h4>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Duration</label>
                                <input type="text" class="form-control" name="duration">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Application Deadline</label>
                                <input type="date" class="form-control" name="last_date">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Stipend</label>
                                <input type="text" class="form-control" name="stipend">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Location</label>
                            <select class="form-select" name="location">
                                <option value="Remote">Remote</option>
                                <option value="On-site">On-site</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Internship</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("companyFooter.php"); ?>
