<?php

session_start();
if (isset($_SESSION["user"])) {
  header("Location: home.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mustashar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="mustasharlogo.png" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="toggleAbout()">About/Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- About Section -->
  <div id="aboutSection" class="about-section">
    <div class="container mt-5">
      <h2 class="text-center mb-4">About Us</h2>
      <p class="lead">At Mustashar, we are more than just a consulting platform; we are a community dedicated to empowering developers
         at every stage of their journey. Our platform connects users with highly skilled consultants specializing in various software domains,
          including UX/UI design, requirement gathering, and quality assurance/control.
           We aim to provide a collaborative space where developers can seek guidance, share knowledge, and enhance their skills.
            Our commitment to fostering a vibrant ecosystem ensures that every developer has access to the expertise they need to 
            succeed in today's competitive landscape.</p>

      <h2 class="text-center mt-5 mb-4">Our Vision</h2>
      <p class="lead">We envision a future where every developer has seamless access to personalized consulting services that cater to their unique 
        challenges. Through Mustashar, we strive to break down barriers in the software development field, 
        enabling developers to connect with top-tier consultants effortlessly. 
        Our vision is to create an inclusive environment that promotes continuous learning, innovation, and collaboration. 
        By harnessing the collective knowledge and skills of our community, we aim to inspire developers to reach their 
        full potential and contribute meaningfully to the world of technology.</p>

      <h2 class="text-center mt-5 mb-4">Contact Us</h2>
      <p class="lead text-center">Email: <a href="mailto:abdulaziz.at00@gmail.com">abdulaziz.at00@gmail.com</a></p>
      <p class="lead text-center">WhatsApp: +966532606063</p>
      
      <div class="text-center">
        <p>Follow us:</p>
       <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
       <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
       <a href="#" class="text-white me-2"><i class="bi bi-linkedin"></i></a>
      </div>

      <div class="container text-center mt-5">
        <p class="lead">&copy; Mustashar 2024</p>
      </div>
    </div>
  </div>


  <script>
    function toggleAbout() {
      var aboutSection = document.getElementById('aboutSection');
      aboutSection.classList.toggle('show');
      var navbar = document.querySelector('.navbar');
      navbar.style.backgroundColor = aboutSection.classList.contains('show') ? '#343a40' : 'transparent'; // Change navbar background color based on section visibility
    }

  </script>

  <style>
    .navbar {
      transition: background-color 0.5s ease;
    }

    .about-section {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease;
      /* Smooth transition for max-height */
      background-color: #343a40;
      /* Match the background color of the navbar */
      color: #fff;
      /* Text color */
      padding: 20px;
    }

    .about-section.show {
      max-height: 1000px;
      /* Set to a large value to allow for dynamic content height */
    }
  </style>

<!-- Log in/Sign up Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">&copy; Mustashar</a>

    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#feedback">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pricing">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#faq">FAQ</a>
        </li>
      </ul>
    </div>

    <div class="navbar-nav">
      <button type="button" class="btn btn-light"
        style="border: 1px solid transparent; padding: 8px 16px; margin-right:5px;" data-bs-toggle="modal"
        data-bs-target="#loginModal">Log in</button>
      <button type="button" class="btn btn-dark" style="border: 1px solid transparent; padding: 8px 16px;"
        data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
    </div>
  </div>
</nav>

  <!-- Login Modal -->
  <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Log in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="loginTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-login" type="button" role="tab" aria-controls="user-login" aria-selected="true">User</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="consultant-tab" data-bs-toggle="tab" data-bs-target="#consultant-login" type="button" role="tab" aria-controls="consultant-login" aria-selected="false">Consultant</button>
          </li>
        </ul>
        <div class="tab-content" id="loginTabsContent">
          <div class="tab-pane fade show active" id="user-login" role="tabpanel" aria-labelledby="user-tab">
            <form action="login.php" method="post" class="mt-3">
              <div class="mb-3 form-group2">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="loginEmail" aria-describedby="loginEmailHelp" name="email2">
                <div id="loginEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3 form-group2">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password2">
              </div>
              <div class="d-grid gap-2 form-group2">
                <button class="btn btn-primary" type="submit" value="login" name="login">Log in</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="consultant-login" role="tabpanel" aria-labelledby="consultant-tab">
            <form action="consultant_login.php" method="post" class="mt-3">
              <div class="mb-3 form-group2">
                <label for="consultantLoginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="consultantLoginEmail" name="email">
              </div>
              <div class="mb-3 form-group2">
                <label for="consultantLoginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="consultantLoginPassword" name="password">
              </div>
              <div class="d-grid gap-2 form-group2">
                <button class="btn btn-primary" type="submit" name="consultant_login" value="login">Log in as Consultant</button>
              </div>
            </form>
          </div>
        </div>
        <p class="mt-3">Don't have an account? <button class="btn btn-link" id="signupBtn">Sign up</button></p>
      </div>
    </div>
  </div>
</div>
<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Create your account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="registration.php" method="post">
          <!-- Username Field -->
          <div class="mb-3 form-group">
            <label for="signupUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="signupUsername" name="username" required>
          </div>

          <!-- Email Field -->
          <div class="mb-3 form-group">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="email" required>
            <div id="signupEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>

          <!-- Password Field -->
          <div class="mb-3 form-group">
            <label for="signupPassword" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="signupPassword" name="password" required>
            </div>
            <span class="form-text" id="passwordRestrictions">
              Password must contain at least:
              <ul>
                <li id="length">8 characters</li>
                <li id="lowercase">1 lowercase letter</li>
                <li id="uppercase">1 uppercase letter</li>
                <li id="number">1 number</li>
              </ul>
            </span>
          </div>

          <!-- Confirm Password Field -->
          <div class="mb-3 form-group">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
          </div>

          <!-- Phone Number Field -->
          <div class="mb-3 form-group">
            <label for="signupPhone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="signupPhone" name="phone_number" placeholder="0551234567" required>
          </div>

          <!-- Birthdate Field -->
          <div class="mb-3 form-group">
            <label for="signupBirthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="signupBirthdate" name="birthdate" required>
          </div>

          <!-- Sign Up Button -->
          <div class="d-grid gap-2 form-group">
            <button class="btn btn-primary mb-3" type="submit" name="signup" value="signup">Sign up</button>
          </div>
        </form>

        <div class="text-center mb-3">
          <hr style="border-color: black; width: 40%; display: inline-block; vertical-align: middle;">
          <span style="padding: 0 5px; font-size: smaller; background-color: rgba(255, 255, 255, 0.5); color: black; vertical-align: middle;">OR</span>
          <hr style="border-color: black; width: 40%; display: inline-block; vertical-align: middle;">
        </div>

        <!-- Google and Github Login Buttons -->
        <div class="d-grid gap-2">
          <button class="btn btn-light btn-lg btn-block d-flex justify-content-center align-items-center mb-2">
            <img src="google.png" alt="Google Logo" style="height: 30px;">
            <span class="ms-2"><i class="fab fa-google me-2"></i> Continue with Google</span>
          </button>
          <button class="btn btn-dark btn-lg btn-block d-flex justify-content-center align-items-center">
            <img src="github.png" alt="Github Logo" style="height: 30px;">
            <span class="ms-2"><i class="fab fa-github me-2"></i> Continue with Github</span>
          </button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Consultant Login Modal -->
<div class="modal fade" id="consultantLoginModal" tabindex="-1" aria-labelledby="consultantLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultantLoginModalLabel">Consultant Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="consultant_login.php" method="post">
          <!-- Email Field -->
          <div class="mb-3 form-group">
            <label for="consultantLoginEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="consultantLoginEmail" name="email" required>
          </div>

          <!-- Password Field -->
          <div class="mb-3 form-group">
            <label for="consultantLoginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="consultantLoginPassword" name="password" required>
          </div>

          <!-- Login Button -->
          <div class="d-grid gap-2 form-group">
            <button class="btn btn-primary mb-3" type="submit" name="consultant_login" value="login">Login as Consultant</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Consultant Registration Modal -->
<div class="modal fade" id="consultantRegisterModal" tabindex="-1" aria-labelledby="consultantRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultantRegisterModalLabel">Create Consultant Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="consultant_registration.php" method="post">
          <!-- First Name Field -->
          <div class="mb-3 form-group">
            <label for="consultantFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="consultantFirstName" name="first_name" required>
          </div>

          <!-- Last Name Field -->
          <div class="mb-3 form-group">
            <label for="consultantLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="consultantLastName" name="last_name" required>
          </div>

          <!-- Email Field -->
          <div class="mb-3 form-group">
            <label for="consultantEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="consultantEmail" name="email" required>
          </div>

          <!-- Password Field -->
          <div class="mb-3 form-group">
            <label for="consultantPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="consultantPassword" name="password" required>
          </div>

          <!-- Confirm Password Field -->
          <div class="mb-3 form-group">
            <label for="consultantConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="consultantConfirmPassword" name="confirm_password" required>
          </div>

          <!-- Age Field -->
          <div class="mb-3 form-group">
            <label for="consultantAge" class="form-label">Age</label>
            <input type="number" class="form-control" id="consultantAge" name="age" required>
          </div>

          <!-- Phone Number Field -->
          <div class="mb-3 form-group">
            <label for="consultantPhone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="consultantPhone" name="phone_number" required>
          </div>

          <!-- Expertise Field -->
          <div class="mb-3 form-group">
            <label for="consultantExpertise" class="form-label">Expertise</label>
            <input type="text" class="form-control" id="consultantExpertise" name="expertise" required>
          </div>

          <!-- Experience Field -->
          <div class="mb-3 form-group">
            <label for="consultantExperience" class="form-label">Experience (years)</label>
            <input type="number" class="form-control" id="consultantExperience" name="experience" required>
          </div>

          <!-- Register Button -->
          <div class="d-grid gap-2 form-group">
            <button class="btn btn-primary mb-3" type="submit" name="consultant_register" value="register">Register as Consultant</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <script>
    // Show the signup modal when "Sign up line" button is clicked
    document.getElementById('signupBtn').addEventListener('click', function () {
      var signupModal = new bootstrap.Modal(document.getElementById('signupModal'));
      signupModal.show();
    });

    function openLoginModal() {
      // Find the login modal by its ID and open it
      var loginModal = document.getElementById('loginModal');
      if (loginModal) {
        var modal = new bootstrap.Modal(loginModal);
        modal.show();
      }
    }
  </script>


  <script>
    document.getElementById('signupPassword').addEventListener('input', function () {
      var password = this.value;
      var restrictions = document.getElementById('passwordRestrictions').querySelectorAll('li');

      restrictions.forEach(function (restriction) {
        if (password.length >= 8) {
          document.getElementById('length').style.opacity = '0.5';
        } else {
          document.getElementById('length').style.opacity = '1';
        }

        if (password.match(/[a-z]/)) {
          document.getElementById('lowercase').style.opacity = '0.5';
        } else {
          document.getElementById('lowercase').style.opacity = '1';
        }

        if (password.match(/[A-Z]/)) {
          document.getElementById('uppercase').style.opacity = '0.5';
        } else {
          document.getElementById('uppercase').style.opacity = '1';
        }

        if (password.match(/[0-9]/)) {
          document.getElementById('number').style.opacity = '0.5';
        } else {
          document.getElementById('number').style.opacity = '1';
        }
      });
    });
  </script>
  


<!--Hero Section-->
<!--Hero Section-->
<section class="bg-dark text-light p-5 text-center text-sm-start">
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between">
      <div>
        <h1 id="typedText" class="text-warning"></h1>
        <p class="lead my-3">Mustashar connects you with professional consultants to help you solve your development challenges
           and guide you through your coding journey. Whether you need expert advice or personalized support, we're here to help you grow.</p>
        <button class="btn btn-primary btn-lg me-3" data-bs-toggle="modal" data-bs-target="#signupModal">Join Us Now</button>
        <button class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#consultantRegisterModal">Join as Consultant</button>
      </div>
      <img class="img-fluid w-50 d-none d-sm-block" src="showcase.svg" alt="">
    </div>
  </div>
</section>

<style>
  .btn-outline-light:hover {
    background-color: #f8f9fa;
    color: #212529;
    transition: all 0.3s ease;
  }
</style>

<!-- Typing Animation CSS -->
<style>
  #typedText {
    font-size: 2.5rem;
    font-weight: bold;
  }
</style>

<!-- Typing Animation JavaScript -->
<script>
  const phrases = [
    "Developer and need help?",
    "Need professional Consultation?",
    "Join us at Mustashar"
  ];
  
  let i = 0;
  let j = 0;
  let currentPhrase = [];
  let isDeleting = false;
  let isEnd = false;

  function loop() {
    isEnd = false;
    document.getElementById('typedText').innerHTML = currentPhrase.join('');

    if (i < phrases.length) {

      if (!isDeleting && j <= phrases[i].length) {
        currentPhrase.push(phrases[i][j]);
        j++;
        document.getElementById('typedText').innerHTML = currentPhrase.join('');
      }

      if (isDeleting && j <= phrases[i].length) {
        currentPhrase.pop(phrases[i][j]);
        j--;
        document.getElementById('typedText').innerHTML = currentPhrase.join('');
      }

      if (j == phrases[i].length) {
        isEnd = true;
        isDeleting = true;
      }

      if (isDeleting && j === 0) {
        currentPhrase = [];
        isDeleting = false;
        i++;
        if (i === phrases.length) {
          i = 0;
        }
      }
    }
    const speed = isEnd ? 2000 : isDeleting ? 50 : 100;
    setTimeout(loop, speed);
  }

  loop();
</script>



  <!--
    Under here is everything under the Hero section
  -->

 <!-- Slideshow Section -->
<section id="services" class="container my-5">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="qualityslidephoto.jpg" class="d-block w-100 fixed-size" alt="Quality Assurance">
        <div class="carousel-caption d-none d-md-block">
          <h5>Quality Assurance</h5>
          <p>Guaranteeing error-free software with meticulous testing.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="pmslidephoto.jpg" class="d-block w-100 fixed-size" alt="Project Management">
        <div class="carousel-caption d-none d-md-block">
          <h5>Project Management</h5>
          <p>Guiding projects to success with expert planning.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="reqslidephoto.jpg" class="d-block w-100 fixed-size" alt="Requirement Gathering">
        <div class="carousel-caption d-none d-md-block">
          <h5>Requirement Gathering</h5>
          <p>Ensuring clear and actionable project objectives.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="ux-uislidephoto.jpg" class="d-block w-100 fixed-size" alt="UX/UI Design">
        <div class="carousel-caption d-none d-md-block">
          <h5>UX/UI Design</h5>
          <p>Delivering user-friendly interfaces for seamless experiences.</p>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
<style>
  .fixed-size {
    height: 500px; 
    object-fit: cover; /* Aspect ratio */
  }
</style>


 <!-- Services Section -->
<section class="bg-light text-dark p-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Consulting Services</h2>
    <div class="row text-center">
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-body">
            <i class="bi bi-pencil-square display-4 text-primary mb-3"></i>
            <h5 class="card-title">UX/UI Design</h5>
            <p class="card-text">Craft modern, stunning, user-friendly interfaces that deliver seamless user experiences.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-body">
            <i class="bi bi-graph-up display-4 text-success mb-3"></i>
            <h5 class="card-title">Requirement Gathering</h5>
            <p class="card-text">Ensure successful project delivery by capturing precise, actionable requirements.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-body">
            <i class="bi bi-check2-circle display-4 text-warning mb-3"></i>
            <h5 class="card-title">Quality Assurance</h5>
            <p class="card-text">Guarantee robust, error-free software with meticulous QA and testing services.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-body">
            <i class="bi bi-clipboard-data display-4 text-info mb-3"></i>
            <h5 class="card-title">Project Management</h5>
            <p class="card-text">Streamline your project workflow with expert guidance for timely delivery and success.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Testimonials Section -->
<section id="feedback" class="bg-dark text-light p-5">
  <div class="container">
    <h2 class="text-center mb-4">What Our Clients Say</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <blockquote class="blockquote">
          <p class="lead">"Mustashar transformed our project's UX, making our product much more user-friendly and efficient."</p>
          <footer class="blockquote-footer">John Doe, <cite title="Company">Tech Solutions Inc.</cite></footer>
        </blockquote>
      </div>
      <div class="col-md-4">
        <blockquote class="blockquote">
          <p class="lead">"Their requirement gathering was spot-on, helping us achieve our project goals seamlessly."</p>
          <footer class="blockquote-footer">Jane Smith, <cite title="Company">StartUp Hub</cite></footer>
        </blockquote>
      </div>
      <div class="col-md-4">
        <blockquote class="blockquote">
          <p class="lead">"Their QA team ensured our app was flawless, and their professionalism is unmatched."</p>
          <footer class="blockquote-footer">Alice Johnson, <cite title="Company">InnovateX</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="bg-light text-dark p-5 text-center">
    <div class="container">
        <h2 class="mb-4">Pricing</h2>
        <p class="lead mb-4">At Mustashar, we believe in personalized consulting that meets your unique needs. Our pricing is based on open communication with our consultants, ensuring you receive the best support tailored to your project requirements.</p>
        <p class="lead mb-4">Our services are billed on an hourly basis, allowing you to choose the level of engagement that suits you. Whether you need a quick consultation or an ongoing partnership, we are here to help!</p>
        <button class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">Get Started</button>
    </div>
</section>

<!-- Frequently Asked Questions Section -->
<section id="faq" class="bg-dark text-light p-5">
  <div class="container">
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            What services does Mustashar offer?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Mustashar provides a range of consulting services including UX/UI Design, Requirement Gathering, Quality Assurance, and Project Management to help you achieve your software development goals.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            How are pricing and payments structured?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Pricing for our services is based on communication with the consultant and is billed on an hourly basis, ensuring flexibility and transparency.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            How do I get started with Mustashar?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            To get started, simply sign up on our platform, browse through our consultants, and reach out to discuss your project needs. We’re here to help!
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Can I choose a specific consultant for my project?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes, you can browse and select consultants based on their expertise, ratings, and services offered to find the perfect match for your project.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Is there support available after the project is completed?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Absolutely! Mustashar offers ongoing support and consultation even after project completion to ensure your continued success and satisfaction.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-secondary text-white mt-0">
  <div class="bg-dark text-center py-3">
    <p class="mb-0">&copy; Mustashar 2024. All Rights Reserved.</p>
  </div>
</footer>







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
