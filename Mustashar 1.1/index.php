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
            <a class="nav-link" href="#" onclick="toggleAbout()">About</a>
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


  <!--Showcase-->
  <section class="bg-dark text-light p-5 text-center text-sm-start">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1>Become a better<span class="text-warning">
              Developer
            </span></h1>
          <p class="lead my-3">We believe that every developer deserves the opportunity to thrive in their coding journey. 
            Our platform offers a unique blend of expertise and designed to elevate your skills and broaden your horizons.</p>
          <p class="lead my-3">Access specialized support with our hourly-based consulting services. Our skilled consultants are ready to help you tackle challenges and enhance your skills, 
            ensuring you receive the guidance you need.</p>
          <p class="lead my-3">Stay in the loop with the latest industry insights and trends, connect with like-minded
            developers, and collaborate on projects seamlessly. </p>
          <p class="lead my-3">Stay ahead in the ever-evolving tech landscape with our resources and insights. 
            Mustashar keeps you informed on the latest trends, helping you remain relevant in your field.</p>
          <p class="lead my-3">Ready to elevate your coding experience? Join us at Mustashar today and unlock your 
            full potential through collaboration and continuous learning!</p>
          <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">Start The
            Enrollment</button>
        </div>
        <img class="img-fluid w-50 d-none d-sm-block" src="showcase.svg" alt="">
      </div>
    </div>
  </section>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">&copy; Mustashar</a>
      <div class="navbar-nav">
        <button type="button" class="btn btn-dark"
          style="border: 1px solid transparent; padding: 8px 16px; margin-right:5px;" data-bs-toggle="modal"
          data-bs-target="#loginModal">Log in</button>
        <button type="button" class="btn btn-light" style="border: 1px solid transparent; padding: 8px 16px;"
          data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
      </div>
    </div>
  </nav>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Log in</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="post">
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
          <div class="mb-3 form-group">
            <label for="signupUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="signupUsername" name="username" required>
          </div>
          <div class="mb-3 form-group">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="email" required>
            <div id="signupEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3 form-group">
            <label for="signupPhone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="signupPhone" name="phone" pattern="[0-9]{10}" required>
            <div class="form-text">Please enter a 10-digit phone number.</div>
          </div>
          <div class="mb-3 form-group">
            <label for="signupAge" class="form-label">Age</label>
            <input type="number" class="form-control" id="signupAge" name="age" min="18" max="99" required>
          </div>
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
          <div class="mb-3 form-group">
            <label for="signupPasswordRepeat" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" id="signupPasswordRepeat" name="repeat_password" required>
          </div>
          <div class="d-grid gap-2 form-group">
            <button class="btn btn-primary mb-3" type="submit" name="submit" value="signup">Sign up</button>
          </div>
        </form>
        
        <div class="text-center mb-3">
          <hr style="border-color: black; width: 40%; display: inline-block; vertical-align: middle;">
          <span style="padding: 0 5px; font-size: smaller; background-color: rgba(255, 255, 255, 0.5); color: black; vertical-align: middle;">OR</span>
          <hr style="border-color: black; width: 40%; display: inline-block; vertical-align: middle;">
        </div>
        
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

  <!--
    Under here is everything under the showcase
  -->

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
<section class="bg-dark text-light p-5">
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
<section class="bg-light text-dark p-5 text-center">
    <div class="container">
        <h2 class="mb-4">Pricing</h2>
        <p class="lead mb-4">At Mustashar, we believe in personalized consulting that meets your unique needs. Our pricing is based on open communication with our consultants, ensuring you receive the best support tailored to your project requirements.</p>
        <p class="lead mb-4">Our services are billed on an hourly basis, allowing you to choose the level of engagement that suits you. Whether you need a quick consultation or an ongoing partnership, we are here to help!</p>
        <button class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">Get Started</button>
    </div>
</section>

<!-- Frequently Asked Questions Section -->
<section class="bg-dark text-light p-5">
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






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>