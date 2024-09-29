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


    $passwordHash=password_hash($password, PASSWORD_DEFAULT);

    $errors= array();

    if( empty($username) or empty($email) or empty($password) ) {

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
        echo "<div class='alert alert-danger'>$error</div>";
        }
        echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
    }else{
        //we will insert data to database
        require_once "database.php";

        $sql="INSERT INTO users (username,email,password) VALUES ( ? , ? , ? ) ";
        $stmt=mysqli_stmt_init($conn);
        $prepareStmt=mysqli_stmt_prepare($stmt,$sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>Sign up successfully.</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
        }else{
            die("Something went wrong.");
        }

    }

}


?>
</body>
</html>




