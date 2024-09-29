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


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];


    $passwordHash=password_hash($password, PASSWORD_DEFAULT);

    $errors= array();

    if (empty($username) OR empty($email) OR empty($phone) OR empty($age) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        array_push($errors, "Phone number must be 10 digits");
    }
    if (!is_numeric($age) || $age < 18 || $age > 99) {
        array_push($errors, "Age must be a number between 18 and 99");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $passwordRepeat) {
        array_push($errors, "Password does not match");
    }

    require_once "database.php";
    $sql= "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount= mysqli_num_rows($result);
    if ($rowCount>0) {
        array_push($errors, "Email already exists!");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO users (username, email, phone, age, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssis", $username, $email, $phone, $age, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong");
        }

    }

}


?>
</body>
</html>




