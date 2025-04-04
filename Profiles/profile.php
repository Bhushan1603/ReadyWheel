<?php
session_start();
require_once '../config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$is_logged_in = true; // Since we're on the profile page, user must be logged in

// Fetch user data
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// If user data not found, set default values
if (!$user) {
    $user = [
        'name' => '',
        'email' => '',
        'mobile' => '',
        'address' => '',
        'created_at' => date('F Y')
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../assets/logo-white.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="profile-edit.css">
    <title>User Profile - Ready Wheel</title>
</head>
<body>
    <header>
        <!-- Navigation Header -->
        <nav class="nav_bar">
            <div class="nav__header">
                <!-- Logo Section -->
                <div class="nav__logo">
                    <a href="index.php" class="logo">
                        <img src="../assets/logo-white.png" alt="logo" class="logo-white" />
                        <span>ReadyWheel</span>
                    </a>
                </div>
                <!-- Menu button for responsive navigation -->
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <!-- Navigation Links -->
            <ul class="nav__links" id="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../About/about.php">About</a></li>
                <li><a href="../why-choose-us/choose.php">Why Choose Us</a></li>
                <li><a href="../rent/rent.php">Rent</a></li>
                <li><a href="owner.php">List Your Car</a></li>
            </ul>
            <!-- Profile Icon (replaces Login Button when logged in) -->
            <div class="nav__btns">
                <div class="profile-icon-container" id="profile-container" style="display: <?php echo $is_logged_in ? 'block' : 'none'; ?>">
                    <img src="../assets/profile-placeholder.jpg" alt="Profile" class="profile-icon" id="profile-icon">
                    <div class="profile-dropdown">
                        <a href="profile.php">My Profile</a>
                        <a href="#">My Bookings</a>
                        <a href="#">Settings</a>
                        <a href="../logout.php" id="logout-btn">Logout</a>
                    </div>
                </div>
                <button id="login-btn" class="btn" style="display: <?php echo $is_logged_in ? 'none' : 'block'; ?>">Login</button>
            </div>
        </nav>
    </header>

    <main class="profile-container">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="../assets/profile-placeholder.jpg" alt="Profile Picture" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3" id="user-name"><?php echo htmlspecialchars($user['fullname']); ?></h5>
                            <p class="text-muted mb-1">Member since: <span id="member-since"><?php echo date('F Y', strtotime($user['created_at'])); ?></span></p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Personal Information</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="full-name"><?php echo htmlspecialchars($user['fullname']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="email"><?php echo htmlspecialchars($user['email']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="phone"><?php echo htmlspecialchars($user['mobile'] ?? ''); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="address"><?php echo htmlspecialchars($user['address'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Verification Documents</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Aadhar Card</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="aadhar">XXXX XXXX 1234</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Driving License</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" id="license">DL-1234567890</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Recent Transactions</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Car</th>
                                            <th>Duration</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transactions-table">
                                        <tr>
                                            <td>15 Mar 2025</td>
                                            <td>Tata Nexon</td>
                                            <td>3 days</td>
                                            <td>₹4,500</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>28 Feb 2025</td>
                                            <td>Mahindra XUV300</td>
                                            <td>1 day</td>
                                            <td>₹1,800</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>10 Feb 2025</td>
                                            <td>Honda City</td>
                                            <td>5 days</td>
                                            <td>₹8,000</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

  <!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-profile-form">
            <div class="row">
              <div class="col-md-4 text-center mb-4">
                <div class="profile-pic-wrapper">
                  <div class="pic-holder">
                    <img id="profilePicPreview" class="pic" src="../assets/profile-placeholder.jpg">
                    <input type="file" id="profilePicUpload" class="uploadProfileInput" accept="image/*">
                    <label for="profilePicUpload" class="upload-file-block">
                      <div class="text-center">
                        <div class="mb-2">
                          <i class="ri-camera-fill" style="font-size: 1.5rem;"></i>
                        </div>
                        <div class="text-uppercase">
                          Update <br> Profile Photo
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="edit-full-name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="edit-full-name" required>
                </div>
                <div class="mb-3">
                  <label for="edit-email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="edit-email" required>
                </div>
                <div class="mb-3">
                  <label for="edit-phone" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="edit-phone" required>
                </div>
                <div class="mb-3">
                  <label for="edit-address" class="form-label">Address</label>
                  <textarea class="form-control" id="edit-address" rows="3" required></textarea>
                </div>
              </div>
            </div>
            
            <hr class="my-4">
            <h6 class="mb-3">Verification Documents</h6>
            
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit-aadhar" class="form-label">Aadhar Card Number</label>
                  <input type="text" class="form-control" id="edit-aadhar">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="edit-license" class="form-label">Driving License Number</label>
                  <input type="text" class="form-control" id="edit-license">
                </div>
              </div>
            </div>
            
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="profile.js"></script>
</body>
</html> 