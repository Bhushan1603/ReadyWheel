<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ReadyWheel</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/logo-white.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="about.css">
</head>
<body>
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
            <li><a href="about.php">About</a></li>
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
    
    <section class="about-hero">
        <div class="container">
            <h1>About ReadyWheel</h1>
            <p>Your trusted partner in vehicle rentals, making travel easier and more accessible for everyone.</p>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <h2>Our Story</h2>
                <p>Founded in 2024, ReadyWheel emerged from a simple idea: to make vehicle rentals accessible, affordable, and hassle-free for everyone. What started as a small local service has grown into a trusted name in the vehicle rental industry, serving customers across the country.</p>
                <p>Our journey began with a fleet of just a few vehicles, but our commitment to customer satisfaction and service excellence has helped us expand our collection to include a wide range of vehicles to suit every need and budget.</p>
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">0+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Vehicles</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Customer Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mission-section">
        <div class="container">
            <div class="about-content">
                <h2>Our Mission & Values</h2>
                <p>At ReadyWheel, we're committed to providing exceptional service and making vehicle rentals accessible to everyone. Our values guide everything we do.</p>
            </div>
            <div class="mission-grid">
                <div class="mission-item">
                    <i class="ri-customer-service-2-line"></i>
                    <h3>Customer First</h3>
                    <p>We prioritize our customers' needs and satisfaction above everything else, ensuring a seamless rental experience.</p>
                </div>
                <div class="mission-item">
                    <i class="ri-shield-check-line"></i>
                    <h3>Safety & Reliability</h3>
                    <p>We maintain the highest standards of vehicle safety and reliability, regularly servicing our fleet.</p>
                </div>
                <div class="mission-item">
                    <i class="ri-hand-coin-line"></i>
                    <h3>Affordability</h3>
                    <p>We believe in providing quality service at competitive prices, making vehicle rentals accessible to all.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="container">
            <div class="about-content">
                <h2>Our Team</h2>
                <p>Meet the dedicated professionals behind ReadyWheel who work tirelessly to provide you with the best service.</p>
            </div>
            <div class="team-grid">
                <div class="team-member">
                    <img src="../assets/Sambit.jpg" alt="CEO">
                    <div class="team-member-info">
                        <h3>Sambit Kumar Behera</h3>
                        <p>CEO & Founder</p>
                        <div class="social-links">
                            <a href="#"><i class="ri-linkedin-fill"></i></a>
                            <a href="#"><i class="ri-instagram-fill"></i></a>
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="../assets/Sangram1.jpg" alt="Operations Manager">
                    <div class="team-member-info">
                        <h3>Sangram Debata</h3>
                        <p>Operations Manager</p>
                        <div class="social-links">
                            <a href="#"><i class="ri-linkedin-fill"></i></a>
                            <a href="#"><i class="ri-instagram-fill"></i></a>
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <img src="../assets/Bhushan.jpg" alt="Customer Service Head">
                    <div class="team-member-info">
                        <h3>Bibhuti Bhushan Sahu</h3>
                        <p>Customer Service Head</p>
                        <div class="social-links">
                            <a href="#"><i class="ri-linkedin-fill"></i></a>
                            <a href="#"><i class="ri-instagram-fill"></i></a>
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="footer">
        <div class="newsletter">
            <h4>Subscribe to Our Newsletter</h4>
            <p>Stay updated with the latest offers and news.</p>
            <form>
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
        <div class="quick-links">
            <a href="#"><i class="ri-questionnaire-line"></i> FAQs</a>
            <a href="#"><i class="ri-phone-line"></i> Contact Support</a>
            <a href="#"><i class="ri-file-list-2-line"></i> Terms & Policies</a>
        </div>
        <div class="section__container footer__container">
            <!-- Footer content here -->
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
              <li><a href="about.php">About</a></li>
              <li><a href="../why-choose-us/choose.php">Why Choose Us</a></li>
              <li><a href="../rent/rent.php">Rent</a></li>
              <li><a href="../Profiles/owner.php">List Your Car</a></li>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="about.js"></script>
    <script src="../app.js"></script>
</body>
</html> 
