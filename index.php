<?php
session_start();
$is_logged_in = isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="assets/logo-white.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Ready Wheel</title>
     <!-- A perfect title -->
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
              <img src="assets/logo-white.png" alt="logo" class="logo-white" />
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
          <li><a href="index.php">Home</a></li>
          <li><a href="About/about.php">About</a></li>
          <li><a href="why-choose-us/choose.php">Why Choose Us</a></li>
          <li><a href="rent/rent.php">Rent</a></li>
          <li><a href="login.php">Register</a></li>
        </ul>
        <!-- Login Button -->
        <div class="nav__btns">
          <div class="profile-icon-container" id="profile-container">
              <img src="assets/profile-placeholder.jpg" alt="Profile" class="profile-icon" id="profile-icon">
              <div class="profile-dropdown">
                  <a href="Profiles/profile.php">My Profile</a>
                  <a href="#">My Bookings</a>
                  <a href="Profiles/owner.php">List Your Car</a>
                  <a href="logout.php" id="logout-btn">Logout</a>
              </div>
          </div>
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
                <form action="register.php" method="post" id="reg_form">
                    <label for="reg-name">Full Name</label>
                    <input type="text" id="reg-name" name="FName" placeholder="Enter your full name" required>

                    <label for="reg-mobile">Mobile Number</label>
                    <input type="tel" id="reg-mobile" name="mob" placeholder="Enter your mobile number" required>

                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="mail" placeholder="Enter your email" required>

                    <label for="reg-password">Password</label>
                    <div class="password-container">
                        <input type="password" id="reg-password" name="reg-password" placeholder="Create a password" required>
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

      <!-- Main header container with an ID of "home" for easy access in CSS/JS -->
      <div class="header__container" id="home">
         <!-- Header image section displaying a car image for visual appeal -->
        <div class="header__image">
          <img src="assets/car.png" alt="header" />
        </div>
        <!-- Main content of the header, includes titles and description -->
        <div class="header__content">
          <!-- Heading for the header section, showcasing platform trust -->
          <h2>👍 100% Trusted car rental platform in India</h2>
          <h1>FAST AND EASY WAY TO RENT A VEHICLE</h1>
          <!-- Section Description -->
          <p class="section__description">
            <!-- Introduction to the Vehicle Rental Platform -->
            Explore the road ahead with ease! Our vehicle rental platform offers a wide selection of cars,
             bikes, available at your convenience. Whether it's for business or leisure,
              we've got the perfect ride waiting for you!
          </p>
        </div>
      </div>
    </header>
    <footer class="footer">
      <!-- Footer Container -->
      <div class="section__container footer__container">
        <!-- Footer Column: Logo and Introduction -->
        <div class="footer__col">
          <!-- Footer Logo -->
          <div class="footer__logo">
            <a href="#" class="logo">
              <!-- Footer image -->
              <img src="assets/logo-white.png" alt="logo" />
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

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="app.js"></script>
  </body>
</html> 