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

    if (isset($_POST["login"])) {
        $email = $_POST["email2"];
        $password = $_POST["password2"];

        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                $_SESSION['user_id'] = $user["id"];
                header("Location: home.php");
                die();
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
                echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
            }
        } else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>"; // Redirect after 2 seconds
        }
    }

    ?>
</body>

</html>