

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php


if(isset($_POST["signup"])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirm_password=$_POST["confirm_password"];
    $phone_number=$_POST["phone_number"];
    $birthdate=$_POST["birthdate"];


    $passwordHash=password_hash($password, PASSWORD_DEFAULT);

    $errors= array();

    if($password != $confirm_password){
        array_push($errors,"Confirmation password is different from the password");
    }


    if( empty($username) or empty($email) or empty($password) or empty($phone_number) or empty($birthdate) ) {

        array_push($errors,"All fields are required");

    }

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        array_push($errors, "Email is not valid");
    }

    
    if ( strlen($password)<8 or (!preg_match('/[a-z]/', $password)) or (!preg_match('/[A-Z]/', $password)) or (!preg_match('/[0-9]/', $password)) ) {
        array_push($errors, "Password must comply to restrictions");
    }

    require_once "database.php";
    $sql= "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount= mysqli_num_rows($result);
    if ($rowCount>0) {
        array_push($errors, "Email already exists!");
    }

    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger' style='position: absolute; top: 20px; right: 50%; z-index: 1050;'>$error</div>";
        }
        echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
    }else{
        //we will insert data to database
        require_once "database.php";

        $sql="INSERT INTO users (username,email,password,phone_number,birthdate) VALUES ( ? , ? , ? , ? , ? ) ";
        $stmt=mysqli_stmt_init($conn);
        $prepareStmt=mysqli_stmt_prepare($stmt,$sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sssss",$username, $email, $passwordHash, $phone_number, $birthdate);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success' style='position: absolute; top: 20px; right: 50%; z-index: 1050;'>Sign up successfully.</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
        }else{
            die("Something went wrong.");
        }

    }

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

<!--Hero Section-->
<section class="bg-dark text-light p-5 text-center text-sm-start">
  <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between">
      <div>
        <h1 id="typedText" class="text-warning"></h1>
        <p class="lead my-3">Mustashar connects you with professional consultants to help you solve your development challenges
           and guide you through your coding journey. Whether you need expert advice or personalized support, we're here to help you grow.</p>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#signupModal">Join Us Now</button>
      </div>
      <img class="img-fluid w-50 d-none d-sm-block" src="showcase.svg" alt="">
    </div>
  </div>
</section>

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







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>




