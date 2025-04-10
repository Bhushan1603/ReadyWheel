<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
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
    <link rel="stylesheet" href="owner.css" />
    <title>List Your Car - Ready Wheel</title>
</head>
<body>
    <header>
        <!-- Navigation Header -->
        <nav class="nav_bar">
            <div class="nav__header">
                <!-- Logo Section -->
                <div class="nav__logo">
                    <a href="../index.php" class="logo">
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
                <li><a href="../about.php">About</a></li>
                <li><a href="../why-choose-us/choose.php">Why Choose Us</a></li>
                <li><a href="../rent/rent.php">Rent</a></li>
                <li><a href="owner.php">List Your Car</a></li>
            </ul>
            <!-- Profile Icon (replaces Login Button when logged in) -->
            <div class="nav__btns">
                <div class="profile-icon-container" id="profile-container">
                    <img src="../assets/profile-placeholder.jpg" alt="Profile" class="profile-icon" id="profile-icon">
                    <div class="profile-dropdown">
                        <a href="profile.php">My Profile</a>
                        <a href="#">My Bookings</a>
                        <a href="#">Settings</a>
                        <a href="../logout.php" id="logout-btn">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="owner-container">
        <div class="container py-5">
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['success_message'];
                    unset($_SESSION['success_message']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Owner Dashboard</h5>
                            <div class="list-group mt-4">
                                <a href="#" class="list-group-item list-group-item-action active">List a New Car</a>
                                <a href="my_listed_cars.php" class="list-group-item list-group-item-action">Cars for Rent</a>
                                <a href="#" class="list-group-item list-group-item-action">Booking Requests</a>
                                <a href="#" class="list-group-item list-group-item-action">Earnings</a>
                                <a href="#" class="list-group-item list-group-item-action">Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">List Your Car</h5>
                            <form action="list_car.php" method="POST" enctype="multipart/form-data" id="list-car-form">
                                <div class="mb-3">
                                    <label for="carName" class="form-label">Car Name</label>
                                    <input type="text" class="form-control" id="carName" name="carName" placeholder="e.g., Tata Nexon, Mahindra XUV300" required>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="carBrand" class="form-label">Brand</label>
                                        <select class="form-select" id="carBrand" name="carBrand" required>
                                            <option value="" selected disabled>Select Brand</option>
                                            <option value="Tata">Tata</option>
                                            <option value="Mahindra">Mahindra</option>
                                            <option value="Honda">Honda</option>
                                            <option value="Hyundai">Hyundai</option>
                                            <option value="Maruti">Maruti</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="carYear" class="form-label">Year</label>
                                        <input type="number" class="form-control" id="carYear" name="carYear" min="2000" max="2025" placeholder="e.g., 2023" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="carType" class="form-label">Car Type</label>
                                        <select class="form-select" id="carType" name="carType" required>
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="Hatchback">Hatchback</option>
                                            <option value="MUV">MUV</option>
                                            <option value="Luxury">Luxury</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fuelType" class="form-label">Fuel Type</label>
                                        <select class="form-select" id="fuelType" name="fuelType" required>
                                            <option value="" selected disabled>Select Fuel Type</option>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="CNG">CNG</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="carSpecs" class="form-label">Car Specifications</label>
                                    <textarea class="form-control" id="carSpecs" name="carSpecs" rows="3" placeholder="Enter details like mileage, engine capacity, features, etc." required></textarea>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="seatingCapacity" class="form-label">Seating Capacity</label>
                                        <input type="number" class="form-control" id="seatingCapacity" name="seatingCapacity" min="2" max="10" placeholder="e.g., 5" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="transmission" class="form-label">Transmission</label>
                                        <select class="form-select" id="transmission" name="transmission" required>
                                            <option value="" selected disabled>Select Transmission</option>
                                            <option value="Manual">Manual</option>
                                            <option value="Automatic">Automatic</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="carPrice" class="form-label">Rental Price (₹ per day)</label>
                                    <input type="number" class="form-control" id="carPrice" name="carPrice" min="500" placeholder="e.g., 1500" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="carLocation" class="form-label">Car Location</label>
                                    <input type="text" class="form-control" id="carLocation" name="carLocation" placeholder="e.g., Angul, Odisha" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="carPhotos" class="form-label">Car Photos</label>
                                    <input type="file" class="form-control" id="carPhotos" name="carPhotos[]" multiple accept="image/*" required>
                                    <div class="form-text">Upload at least 3 photos of your car (exterior, interior, etc.)</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="carAvailability" class="form-label">Availability</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="availableNow" name="availableNow" checked>
                                        <label class="form-check-label" for="availableNow">
                                            Available for booking now
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Submit Listing</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
                        <span>ReadyWheel</span>
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
                    <li><a href="#"><i class="ri-facebook-fill"></i></a></li>
                    <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
                    <li><a href="#"><i class="ri-linkedin-fill"></i></a></li>
                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                    <li><a href="#"><i class="ri-youtube-fill"></i></a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>Our Services</h4>
                <ul class="footer__links">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li><a href="../rent/rent.php">Rental Deals</a></li>
                    <li><a href="../why-choose-us/choose.php">Why Choose Us</a></li>
                    <li><a href="#">Testimonials</a></li>
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
                <ul class="footer__links">
                    <li>
                        <a href="#">
                            <span><i class="ri-phone-fill"></i></span> +91 9998887775
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="ri-map-pin-fill"></i></span> Angul, Odisha, India
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="ri-mail-fill"></i></span> info@readywheel.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../app.js"></script>
</body>
</html> 