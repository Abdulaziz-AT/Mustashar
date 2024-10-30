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

if(isset($_POST["consultant_register"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $age = $_POST["age"];
    $phone_number = $_POST["phone_number"];
    $field = $_POST["field"];
    $experience = $_POST["experience"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    // Check if the passwords match
    if($password != $confirm_password){
        array_push($errors, "Password and Confirm Password do not match.");
    }

    // Validate other fields
    if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($phone_number) || empty($field) || empty($experience) || empty($age)) {
        array_push($errors, "All fields are required.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email address.");
    }

    // Password strength check
    if(strlen($password) < 8 || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        array_push($errors, "Password must contain at least 8 characters, 1 lowercase letter, 1 uppercase letter, and 1 number.");
    }

    // Check if email already exists in the database
    require_once "database.php";
    $sql = "SELECT * FROM consultants WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        array_push($errors, "Email already exists.");
    }

    // Handle errors
    if(count($errors) > 0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger' style='position: absolute; top: 20px; right: 50%; z-index: 1050;'>$error</div>";
        }
        echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
    } else {
        // Insert data into consultants table
        $sql = "INSERT INTO consultants (first_name, last_name, email, password, age, phone_number, field, experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssissi", $first_name, $last_name, $email, $passwordHash, $age, $phone_number, $field, $experience);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success' style='position: absolute; top: 20px; right: 50%; z-index: 1050;'>Consultant registered successfully.</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
        } else {
            die("Error with SQL statement.");
        }
    }
}

?>
</body>
</html>
