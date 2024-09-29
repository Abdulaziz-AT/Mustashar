<?php

session_start();
if (!isset($_SESSION["user"])) {
  header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$usernameSQL = "SELECT username, email, bio, phone_number FROM users WHERE id=$user_id";

require_once "database.php";
$result = mysqli_query($conn, $usernameSQL);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $username = $row["username"];
  $email = $row["email"];
  $bio = $row["bio"];
  $phone_number = $row["phone_number"];
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
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    html, body{
      height: 100%;
    }

    body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
.container {
  flex: 1;
}
  </style>


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

  
<!-- User Dashboard Section -->
<div class="container mt-5">
  <h2 class="text-center mb-4">User Dashboard</h2>

  <!-- User Information -->
  <div class="row">
    <div class="col-md-4">
      <div class="bg-light rounded p-3 shadow-sm">
        <h5 class="text-center">Welcome, <?php echo $username; ?></h5>
        <!-- Profile Photo -->
        <div class="text-center mb-3">
          <img src="profile-icon.svg" alt="Profile Photo" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
        </div>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <?php if (!empty($bio)) { ?>
          <p><strong>Bio:</strong> <?php echo $bio; ?></p>
        <?php } ?>
        <?php if (!empty($phone_number)) { ?>
          <p><strong>Phone Number:</strong> <?php echo $phone_number; ?></p>
        <?php } ?>
        <button class="btn btn-primary" onclick="showEditProfileForm()"><i class="bi bi-pencil"></i> Edit Profile</button>
      </div>
    </div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateProfile.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- Profile Photo Upload -->
          <div class="mb-3">
            <label for="profilePhoto" class="form-label">Profile Photo</label>
            <input type="file" class="form-control" id="profilePhoto" name="profile_photo" accept="image/*">
          </div>
          <div class="text-center mb-3">
            <img id="previewPhoto" src="profile-icon.svg" alt="Profile Photo Preview" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
          </div>
          <div class="mb-3">
            <label for="bioInput" class="form-label">Bio</label>
            <textarea class="form-control" id="bioInput" name="bio" rows="3" required><?php echo htmlspecialchars($bio); ?></textarea>
          </div>
          <div class="mb-3">
            <label for="phoneInput" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phoneInput" name="phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" required>
          </div>
          <!-- Birthdate Input -->
          <div class="mb-3">
            <label for="birthdateInput" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdateInput" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function showEditProfileForm() {
    var editModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
    editModal.show();
  }

  // Preview profile photo before uploading
  document.getElementById('profilePhoto').addEventListener('change', function(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var preview = document.getElementById('previewPhoto');
      preview.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  });
</script>

    <!-- Requests Section -->
    <div class="col-md-8">
      <h4 class="mt-4">Requests Overview</h4>

      <!-- Search Bar -->
      <div class="input-group mb-3">
        <input type="text" id="searchRequests" class="form-control" placeholder="Search your requests..." aria-label="Search requests">
        <button class="btn btn-primary" type="button" onclick="searchRequests()">Search</button>
      </div>

      <!-- Active Requests -->
<div class="list-group mb-3">
  <button class="btn btn-success" 
          onclick="toggleCollapse('activeRequests')">
    Active Requests
  </button>
  <div class="collapse show" id="activeRequests"> <!-- Add class 'show' to display by default -->
    <div class="list-group">
      <!-- Replace with dynamic PHP code to fetch active requests -->
      <div class="list-group-item">
        <p class="mb-1">Request 3: Working on quality assurance for project X.</p>
        <small class="text-muted">Started on: 2024-09-25</small>
      </div>
      <div class="list-group-item">
        <p class="mb-1">Request 4: Gathering requirements for project Y.</p>
        <small class="text-muted">Started on: 2024-09-24</small>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests -->
<div class="list-group mb-3">
  <button class="btn btn-dark" 
          onclick="toggleCollapse('pendingRequests')">
    Pending Requests
  </button>
  <div class="collapse" id="pendingRequests">
    <div class="list-group">
      <!-- Replace with dynamic PHP code to fetch pending requests -->
      <div class="list-group-item">
        <p class="mb-1">Request 1: Need assistance with UX design.</p>
        <small class="text-muted">Submitted on: 2024-09-29</small>
      </div>
      <div class="list-group-item">
        <p class="mb-1">Request 2: Help with project management.</p>
        <small class="text-muted">Submitted on: 2024-09-28</small>
      </div>
    </div>
  </div>
</div>

<!-- History of Requests -->
<div class="list-group mb-3">
  <button class="btn btn-secondary" 
          onclick="toggleCollapse('historyRequests')">
    History of Requests
  </button>
  <div class="collapse" id="historyRequests">
    <div class="list-group">
      <!-- Replace with dynamic PHP code to fetch completed requests -->
      <div class="list-group-item">
        <p class="mb-1">Request 5: Completed: UI design for project Z.</p>
        <small class="text-muted">Completed on: 2024-09-15</small>
      </div>
      <div class="list-group-item">
        <p class="mb-1">Request 6: Completed: Code review for project A.</p>
        <small class="text-muted">Completed on: 2024-09-10</small>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div>
</div>

<script>

function toggleCollapse(target) {
      const collapseElement = document.getElementById(target);
      const bsCollapse = new bootstrap.Collapse(collapseElement, {
        toggle: true
      });
    }

  </script>


  <!-- Footer -->
<footer class="bg-secondary text-white mt-0">
  <div class="bg-dark text-center py-3">
    <p class="mb-0">&copy; Mustashar 2024. All Rights Reserved.</p>
  </div>
</footer>


</body>
