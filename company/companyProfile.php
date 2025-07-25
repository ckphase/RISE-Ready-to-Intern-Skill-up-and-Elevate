<?php
session_start();

if (!isset($_SESSION['company_id'])) {
    header("Location: companyLogin.php");
    exit();
}

$company_id = $_SESSION['company_id'];

include("companyHeader.php");
include('../dbms/connection.php');

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_name = $_POST['company_name'];
    $industry = $_POST['industry'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $website = $_POST['website'];
    $company_size = $_POST['company_size'];

    // Update companies table
    $update1 = "UPDATE companies SET 
        company_name='$company_name',
        industry='$industry',
        location='$location',
        description='$description',
        website='$website',
        company_size='$company_size'
        WHERE user_id = $company_id";
    mysqli_query($db, $update1);

    // Update users table
    $update2 = "UPDATE users SET 
        email='$email',
        contact='$contact'
        WHERE id = $company_id";
    mysqli_query($db, $update2);

    echo "<div class='alert alert-success text-center'>Profile updated successfully!</div>";
}

// Fetch data
$sql = "SELECT u.name, u.email, u.contact,
               c.company_name, c.description, c.location, 
               c.industry, c.website, c.company_size 
        FROM users u 
        LEFT JOIN companies c ON u.id = c.user_id 
        WHERE u.id = $company_id AND u.role = 'company'";

$result = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($result);
?>
<div class="container-fluid text-white" style="background: rgba(136, 211, 238, 1); padding: 40px 0; box-shadow: 0 2px 10px rgba(0,0,0,0.3);">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black" style="letter-spacing: 1px;">Your Profile and Data</h2>
                <h4 class="mb-0 text-light">RISE Info and Profile Page</h4>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <h2 class="mb-4">Company Profile</h2>
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Company Name</label>
                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name']; ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Industry</label>
                <input type="text" name="industry" class="form-control" value="<?php echo $data['industry']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $data['contact']; ?>">
            </div>
        </div>

        <div class="mb-3">
            <label>Location</label>
            <textarea name="location" class="form-control"><?php echo $data['location']; ?></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Website</label>
                <input type="text" name="website" class="form-control" value="<?php echo $data['website']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label>Company Size</label>
                <select name="company_size" class="form-select">
                    <option <?php if ($data['company_size'] == '1-10 employees') echo 'selected'; ?>>1-10 employees</option>
                    <option <?php if ($data['company_size'] == '11-50 employees') echo 'selected'; ?>>11-50 employees</option>
                    <option <?php if ($data['company_size'] == '51-200 employees') echo 'selected'; ?>>51-200 employees</option>
                    <option <?php if ($data['company_size'] == '201-500 employees') echo 'selected'; ?>>201-500 employees</option>
                    <option <?php if ($data['company_size'] == '500+ employees') echo 'selected'; ?>>500+ employees</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Company Description</label>
            <textarea name="description" class="form-control" rows="4"><?php echo $data['description']; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

<?php include("companyFooter.php"); ?>
