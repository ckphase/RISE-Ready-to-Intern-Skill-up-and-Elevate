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
include('../dbms/connection.php');

// Fetch from `users` and `company` tables
$query = "SELECT 
            u.name, u.email, u.contact, u.status,
            c.company_name, c.description, c.location, c.approval_status, c.industry, c.website
          FROM users u 
          LEFT JOIN companies c ON u.id = c.user_id
          WHERE u.id = ? AND u.role = 'company'";

$stmt = $db->prepare($query);
$stmt->bind_param("i", $company_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $data = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger'>No company data found.</div>";
    exit();
}
?>

<div class="container-fluid text-white" style="
    background: rgba(136, 211, 238, 1);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    padding-top:40px;
    padding-bottom:40px;
">

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-1 text-black text-border" style="letter-spacing: 1px;">Your Profile and Details
                </h2>
                <h4 class="mb-0 text-camelcase text-light">RISE Profile Page</h4>
            </div>
        </div>
    </div>
</div>
<div class="container py-4">
    <!-- Profile Section -->
    <h2 class="mb-4">Company Profile</h2>
    <div class="row g-3">
        <div class="col-3">
            <div class="card border-3">
                <div class="card-body">
                    <div class="text-center">
                        <img src="..\img\default_pp.jpg" class="img-thumbnail rounded-circle border-0" alt="no image found">
                        <h6 class="pt-2">Upload New Image</h6>
                        <input type="file" value="">
                    </div>
                    <div class="row py-2">
                        <div class="col-12">
                            <div class="card border rounded-bottom-0">
                                <div class="card-body py-1" style="background: rgb(222,226,230);">
                                    Your Name
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card rounded-0 border-top-0 rounded-bottom">
                                <div class="card-body py-1">
                                    <?php echo htmlspecialchars($data['name']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-12">
                            <div class="card border rounded-bottom-0">
                                <div class="card-body py-1" style="background: rgb(222,226,230);">
                                    Contact
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card rounded-0 border-top-0">
                                <div class="card-body py-1">
                                    <?php echo htmlspecialchars($data['contact']); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card rounded-0 border-top-0 rounded-bottom">
                                <div class="card-body py-1">
                                    <?php echo htmlspecialchars($data['email']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="card border-3">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['company_name']); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Industry</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['industry']); ?>">                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($data['email']); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" value="<?php echo htmlspecialchars($data['contact']); ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <textarea class="form-control" rows="3" value="<?php echo htmlspecialchars($data['location']); ?>"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" value="<?php echo htmlspecialchars($data['website']); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Size</label>
                                <select class="form-select">
                                    <option>1-10 employees</option>
                                    <option selected>51-200 employees</option>
                                    <option>201-500 employees</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Description</label>
                            <textarea class="form-control"
                                rows="4" value="<?php echo htmlspecialchars($data['description']); ?>"></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("companyFooter.php");
?>