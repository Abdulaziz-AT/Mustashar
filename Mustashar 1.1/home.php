<?php

session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$usernameSQL = "SELECT username FROM users WHERE id=$user_id";

require_once "database.php";
$result = mysqli_query($conn, $usernameSQL);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $username = $row["username"];
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
          <a class="nav-link" style="margin-top:10px;"href="#" onclick="toggleAbout()">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AccountDetails.php">
            <img src="profile.png" alt="Profile" style="height: 40px; width: 40px;margin-left:10px; border-radius: 50%;">
          </a>
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


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">&copy; Mustashar</a>
      <form action="logout.php" method="post">
        <div class="navbar-nav">
          <button type="submit" class="btn btn-danger" style="border: 1px solid transparent; padding: 8px 16px;">Sign
            out</button>
        </div>
      </form>

    </div>
  </nav>

  <style>
    .consultant-card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      transition: transform 0.3s ease;
      margin-bottom: 20px;
    }

    .consultant-card:hover {
      transform: scale(1.05);
    }

    .filter-btn-group {
      margin-bottom: 30px;
      text-align: center;
    }

    .filter-btn-group .btn {
      margin: 5px;
    }

    .consultant-card img {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .consultant-info {
      padding: 20px;
    }

    .filter-btn-group .btn.active {
      background-color: #343a40;
      color: #fff;
    }
  </style>



<!-- View all consultants -->

  <div class="container mt-5">
    <h2 class="text-center mb-4">Our Consultants</h2>

    <!-- Filter Buttons -->
    <div class="filter-btn-group">
      <button class="btn btn-outline-dark active" onclick="filterConsultants('all')">All</button>
      <button class="btn btn-outline-dark" onclick="filterConsultants('uxui')">UX/UI</button>
      <button class="btn btn-outline-dark" onclick="filterConsultants('req')">Requirements Gathering</button>
      <button class="btn btn-outline-dark" onclick="filterConsultants('qa')">Quality Assurance</button>
      <button class="btn btn-outline-dark" onclick="filterConsultants('pm')">Project Management</button>
    </div>

    <!-- Consultants List -->
    <div class="row" id="consultantsList">
      <!-- Sample Consultant Card -->
      <div class="col-md-4 mb-4 consultant-card" data-category="uxui">
        <img src="consultant1.jpg" class="img-fluid" alt="Consultant 1">
        <div class="consultant-info">
          <h4>John Doe</h4>
          <p>Specialization: UX/UI Design</p>
          <p>Rate: $50/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="req">
        <img src="consultant2.jpg" class="img-fluid" alt="Consultant 2">
        <div class="consultant-info">
          <h4>Jane Smith</h4>
          <p>Specialization: Requirements Gathering</p>
          <p>Rate: $60/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="req">
        <img src="consultant3.jpg" class="img-fluid" alt="Consultant 3">
        <div class="consultant-info">
          <h4>Abdulaziz Altekhaifi</h4>
          <p>Specialization: Requirements Gathering</p>
          <p>Rate: $65/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="qa">
        <img src="consultant3.jpg" class="img-fluid" alt="Consultant 4">
        <div class="consultant-info">
          <h4>Abdulelah Alothman</h4>
          <p>Specialization: Quality Assurance</p>
          <p>Rate: $55/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="pm">
        <img src="consultant3.jpg" class="img-fluid" alt="Consultant 5">
        <div class="consultant-info">
          <h4>Faisal Aljeraiwy</h4>
          <p>Specialization: Project Managements</p>
          <p>Rate: $60/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="uxui">
        <img src="consultant3.jpg" class="img-fluid" alt="Consultant 6">
        <div class="consultant-info">
          <h4>Abdulmajeed Albabtain</h4>
          <p>Specialization: UX/UI</p>
          <p>Rate: $55/hr</p>
        </div>
      </div>

      <div class="col-md-4 mb-4 consultant-card" data-category="qa">
        <img src="consultant3.jpg" class="img-fluid" alt="Consultant 7">
        <div class="consultant-info">
          <h4>Chris Evans</h4>
          <p>Specialization: Quality Assurance</p>
          <p>Rate: $55/hr</p>
        </div>
      </div>

      <!-- Add more consultant cards as needed -->
    </div>
  </div>

  <script>
    function filterConsultants(category) {
      const consultants = document.querySelectorAll('.consultant-card');
      consultants.forEach(consultant => {
        consultant.style.display = category === 'all' || consultant.getAttribute('data-category') === category ? 'block' : 'none';
      });
      document.querySelectorAll('.filter-btn-group .btn').forEach(btn => btn.classList.remove('active'));
      document.querySelector(`[onclick="filterConsultants('${category}')"]`).classList.add('active');
    }
  </script>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
