<?php
// Database connection
$host = 'localhost';
$dbname = 'readywheel_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get vehicle ID from URL parameter
    $vehicle_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($vehicle_id > 0) {
        // Fetch vehicle details
        $stmt = $pdo->prepare("SELECT * FROM listed_vehicles WHERE id = ?");
        $stmt->execute([$vehicle_id]);
        $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($vehicle) {
            // Fetch vehicle images
            $stmt = $pdo->prepare("SELECT image_path FROM vehicle_images WHERE vehicle_id = ?");
            $stmt->execute([$vehicle_id]);
            $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $vehicle['images'] = $images;
        }
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivee - Car Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Common CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Car Detail Specific CSS -->
    <link rel="stylesheet" href="car-detail.css">
    <link rel="icon" type="image/png" href="../assets/logo-white.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
    <!-- Navbar -->
        <header>
            <!-- Navigation Header -->
            <!-- Navigation Header containing the logo and menu button -->
            <nav class="nav_bar">
              <div class="nav__header">
                <!-- Logo Section: Links to the homepage with different logo images for light/dark mode -->
                <div class="nav__logo">
                  <!-- Logo Header -->
                  <a href="#" class="logo">
                    <img src="../assets/logo-white.png" alt="logo" class="logo-white" />
                    <!-- Text Logo displaying the platform's name -->
                    <span>ReadyWheel</span>
                  </a>
                </div>
                <!-- Menu button for responsive navigation (appears on smaller screens) -->
                <div class="nav__menu__btn" id="menu-btn">
                  <!-- Menu icon (menu bar) for mobile navigation -->
                  <i class="ri-menu-line"></i>
                </div>
              </div>
               <!-- Navigation Links -->
              <ul class="nav__links" id="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../About/about.php">About</a></li>
                <li><a href="../why-choose-us/choose.php">Why Choose Us</a></li>
                <li><a href="../rent/rent.php">Rent</a></li>
                <li><a href="http://127.0.0.1:5500/login.php?">Register</a></li>
              </ul>
              <!-- Login Button -->
              <div class="nav__btns">
                <button id="login-btn" class="btn">Login</button>
              </div>
            </nav>
      
            <!-- Login Pop up Start-->
      
                <!-- Login Popup -->
                <div class="overlay" id="login-popup">
                  <div class="popup">
                      <span class="close-btn" id="close-login">&times;</span>
                      <h2>Welcome Back</h2>
                      <form method="post" id="log_form">
                          <label for="login-username">Username</label>
                          <input type="text" id="login-username" name="login-username" placeholder="Enter your username" required>
                          
                          <label for="login-password">Password</label>
                          <div class="password-container">
                              <input type="password" id="login-password" name="login-password" placeholder="Enter your password" required>
                              <span class="toggle-password" data-target="login-password">&#128065;</span>
                          </div>
      
                          <button type="submit">Login</button>
                      </form>
                      <div class="switch-link">
                          Don't have an account? <a href="#" id="show-register">Register here</a>
                      </div>
                  </div>
              </div>
      
              <!-- Registration Popup -->
              <div class="overlay" id="register-popup">
                  <div class="popup">
                      <span class="close-btn" id="close-register">&times;</span>
                      <h2>Create Account</h2>
                      <form method="post" id="reg_form">
                          <label for="reg-name">Full Name</label>
                          <input type="text" id="reg-name" name="FName" placeholder="Enter your full name" required>
      
                          <label for="reg-mobile">Mobile Number</label>
                          <input type="tel" id="reg-mobile" name="mob" placeholder="Enter your mobile number" required>
      
                          <label for="reg-email">Email</label>
                          <input type="email" id="reg-email" name="mail" placeholder="Enter your email" required>
      
                          <label for="reg-password">Password</label>
                          <div class="password-container">
                              <input type="password" id="reg-password" placeholder="Create a password" required>
                              <span class="toggle-password" data-target="reg-password">&#128065;</span>
                          </div>
      
                          <label for="reg-confirm-password">Confirm Password</label>
                          <div class="password-container">
                              <input type="password" id="reg-confirm-password" placeholder="Confirm your password" required>
                              <span class="toggle-password" data-target="reg-confirm-password">&#128065;</span>
                          </div>
      
                          <button type="submit">Register</button>
                      </form>
                      <div class="switch-link">
                          Already have an account? <a href="#" id="show-login">Login here</a>
                      </div>
                  </div>
              </div>
      
            <!-- Login Pop up end -->
     </header>

    <!-- Main Content -->
    <main class="container my-5">
        <?php if (isset($vehicle) && $vehicle): ?>
        <div class="row">
            <!-- Car Showcase Section -->
            <div class="col-lg-7">
                <div class="car-showcase bg-light rounded-3 p-3 mb-3">
                    <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="carouselInner">
                            <?php foreach($vehicle['images'] as $index => $image): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <img src="<?php echo htmlspecialchars($image); ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($vehicle['name']); ?>">
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="row mt-3" id="thumbnailContainer">
                        <?php foreach($vehicle['images'] as $index => $image): ?>
                        <div class="col-3 mb-3">
                            <img src="<?php echo htmlspecialchars($image); ?>" 
                                 class="img-thumbnail" 
                                 alt="Thumbnail"
                                 onclick="$('#carCarousel').carousel(<?php echo $index; ?>)">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Car Details -->
                <div class="car-details mt-5">
                    <h2 class="fw-bold"><?php echo htmlspecialchars($vehicle['name']); ?></h2>
                    <p class="text-muted"><?php echo htmlspecialchars($vehicle['description']); ?></p>

                    <!-- Specifications -->
                    <div class="specifications mt-5">
                        <h3 class="fw-bold mb-4">Specifications</h3>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><i class="fas fa-car"></i> Brand</td>
                                        <td><?php echo htmlspecialchars($vehicle['brand']); ?></td>
                                        <td><i class="fas fa-calendar"></i> Year</td>
                                        <td><?php echo htmlspecialchars($vehicle['year']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-cog"></i> Transmission</td>
                                        <td><?php echo htmlspecialchars($vehicle['transmission']); ?></td>
                                        <td><i class="fas fa-gas-pump"></i> Fuel Type</td>
                                        <td><?php echo htmlspecialchars($vehicle['fuel_type']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-users"></i> Seating Capacity</td>
                                        <td><?php echo htmlspecialchars($vehicle['passenger_capacity']); ?></td>
                                        <td><i class="fas fa-palette"></i> Color</td>
                                        <td><?php echo htmlspecialchars($vehicle['color']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-tachometer-alt"></i> Mileage</td>
                                        <td><?php echo htmlspecialchars($vehicle['mileage']); ?> km/l</td>
                                        <td><i class="fas fa-engine"></i> Engine</td>
                                        <td><?php echo htmlspecialchars($vehicle['engine']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Form Section -->
            <div class="col-lg-5">
                <div class="booking-form bg-light p-4 rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="fw-bold mb-0"><?php echo htmlspecialchars($vehicle['name']); ?></h3>
                        <button class="btn btn-outline-secondary rounded-circle" id="favoriteBtn">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                    
                    <div class="mb-4">
                        <p class="text-primary fw-bold fs-4 mb-0">₹<?php echo number_format($vehicle['price'], 2); ?></p>
                    </div>

                    <form action="booking-process.php" method="POST" id="bookingForm">
                        <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['id']; ?>">
                        <input type="hidden" name="price_per_day" value="<?php echo $vehicle['price']; ?>">

                        <!-- Location -->
                        <div class="mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-2"></i> Location
                            </label>
                            <input type="text" name="location" class="form-control" required>
                        </div>

                        <!-- Pick-Up -->
                        <div class="mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="far fa-calendar-alt me-2"></i> Pick-Up
                            </label>
                            <div class="row">
                                <div class="col-7">
                                    <input type="date" name="pickup_date" class="form-control" required>
                                </div>
                                <div class="col-5">
                                    <input type="time" name="pickup_time" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <!-- Drop-Off -->
                        <div class="mb-4">
                            <label class="form-label d-flex align-items-center">
                                <i class="far fa-calendar-alt me-2"></i> Drop-Off
                            </label>
                            <div class="row">
                                <div class="col-7">
                                    <input type="date" name="dropoff_date" class="form-control" required>
                                </div>
                                <div class="col-5">
                                    <input type="time" name="dropoff_time" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <!-- Duration and Price -->
                        <div class="duration-price d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <p class="mb-0 fw-bold">Duration</p>
                                <p class="mb-0 text-muted" id="durationText">Calculate duration</p>
                            </div>
                            <div>
                                <p class="mb-0 fw-bold fs-4" id="totalPrice">₹0.00</p>
                            </div>
                        </div>

                        <!-- Book Now Button -->
                        <button type="submit" class="btn btn-primary w-100 py-3">BOOK NOW</button>
                    </form>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-warning">
            Vehicle not found or invalid vehicle ID.
            <a href="rent.php" class="alert-link">Return to vehicle listing</a>
        </div>
        <?php endif; ?>
    </main>
 <!-- footer starts -->
    <footer class="footer">
      <!-- Footer Container -->
      <div class="section__container footer__container">
        <!-- Footer Column: Logo and Introduction -->
        <div class="footer__col">
          <!-- Footer Logo -->
          <div class="footer__logo">
            <a href="#" class="logo">
              <!-- Footer image -->
              <img src="../assets/logo-white.png" alt="logo" />
              <span>Car Rental</span>
            </a>
          </div>
          <!-- Service Description -->
          <p>
            We're here to provide you with the best vehicles and a seamless
            rental experience. Stay connected for updates, special offers, and
            more. Drive with confidence!
          </p>
          <!-- Social Media Links -->
          <ul class="footer__socials">
            <!-- Social Media Links List -->
            <li>
              <!-- Facebook link with icon -->
              <a href="#"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <!-- Twitter link with icon -->
              <a href="#"><i class="ri-twitter-fill"></i></a>
            </li>
            <li>
              <!-- LinkedIn link with icon -->
              <a href="#"><i class="ri-linkedin-fill"></i></a>
            </li>
            <li>
              <!-- Instagram link with icon -->
              <a href="#"><i class="ri-instagram-line"></i></a>
            </li>
            <li>
               <!-- YouTube link with icon -->
              <a href="#"><i class="ri-youtube-fill"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Our Services</h4>
          <!-- Footer Column: Our Services -->
          <ul class="footer__links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#deals">Rental Deals</a></li>
            <li><a href="#choose">Why Choose Us</a></li>
            <li><a href="#client">Testimonials</a></li>
          </ul>
        </div>
        <!-- Footer Column: Vehicles Brand -->
        <div class="footer__col">
          <h4>Vehicles Brand</h4>
          <ul class="footer__links">
            <li><a href="#">Tata Cars</a></li>
            <li><a href="#">Mahindra cars</a></li>
            <li><a href="#">Tata Cars</a></li>
            <li><a href="#">Hero Bikes</a></li>
            <li><a href="#">Honda Scooters</a></li>
           
          </ul>
        </div>
        <!-- Footer Column: Contact Information -->
        <div class="footer__col">
          <h4>Contact</h4>
          <!-- List of Contact Details -->
          <ul class="footer__links">
             <!-- Contact Number -->
            <li>
              <a href="#">
                <span><i class="ri-phone-fill"></i></span> +91 9998887775
              </a>
            </li>
            <!-- Physical Address -->
            <li>
              <a href="#">
                <span><i class="ri-map-pin-fill"></i></span> Angul,odisha,India
              </a>
            </li>
            <!-- Email Address -->
            <li>
              <a href="#">
                <span><i class="ri-mail-fill"></i></span> info@readywheel
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        <!-- Footer copyright text with our website name  -->
        Copyright © 2025 Readywheel. All rights reserved.
        <br>Made with 	&#10084;
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for booking calculations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('bookingForm');
            const pricePerDay = parseFloat(form.querySelector('[name="price_per_day"]').value);
            const durationText = document.getElementById('durationText');
            const totalPrice = document.getElementById('totalPrice');
            
            function calculateDuration() {
                const pickupDate = form.querySelector('[name="pickup_date"]').value;
                const dropoffDate = form.querySelector('[name="dropoff_date"]').value;
                
                if (pickupDate && dropoffDate) {
                    const start = new Date(pickupDate);
                    const end = new Date(dropoffDate);
                    const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
                    
                    if (days > 0) {
                        const total = days * pricePerDay;
                        durationText.textContent = `${days} day${days > 1 ? 's' : ''}`;
                        totalPrice.textContent = `₹${total.toFixed(2)}`;
                    } else {
                        durationText.textContent = 'Invalid dates';
                        totalPrice.textContent = '₹0.00';
                    }
                }
            }

            // Add event listeners for date changes
            form.querySelector('[name="pickup_date"]').addEventListener('change', calculateDuration);
            form.querySelector('[name="dropoff_date"]').addEventListener('change', calculateDuration);

            // Handle form submission
            form.addEventListener('submit', function(e) {
                const pickupDate = new Date(form.querySelector('[name="pickup_date"]').value);
                const dropoffDate = new Date(form.querySelector('[name="dropoff_date"]').value);
                
                if (pickupDate >= dropoffDate) {
                    e.preventDefault();
                    alert('Drop-off date must be after pick-up date');
                }
            });
        });
    </script>
</body>
</html> 
</html> 