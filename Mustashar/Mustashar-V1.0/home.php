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




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>