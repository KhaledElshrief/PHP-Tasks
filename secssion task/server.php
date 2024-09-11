<?php
echo "Welcome to the server";

// Establishing database connection using PDO
$connection = new PDO("mysql:host=localhost;dbname=test", "root", "");

// Registration process
if (isset($_POST["register"])) {
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $targetpath = "images/" . basename($filename);
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validating username
    $username_check = "/^[a-zA-Z]{3,}$/";
    if (!preg_match($username_check, $username)) {
        header("Location: register.php?message=Invalid username, try another one.");
        exit;
    }

    // Validating password
    $password_check = "/^[0-9]{3,9}$/";
    if (!preg_match($password_check, $password)) {
        header("Location: register.php?message=Password should contain more than 3 numbers.");
        exit;
    }

    // Validating email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?message=Email is not valid.");
        exit;
    }

    // Encrypting password
    $encPassword = md5($password);

    // Checking if the email already exists
    $checkEmail = "SELECT * FROM users WHERE email = :email";
    $EmailQuery = $connection->prepare($checkEmail);
    $EmailQuery->bindParam(':email', $email);
    $EmailQuery->execute();
    $result = $EmailQuery->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // If the email doesn't exist, proceed with the registration
        if (move_uploaded_file($tempname, $targetpath)) {
            $query = "INSERT INTO users(name, email, password, image) VALUES (:name, :email, :password, :image)";
            $sqlQuery = $connection->prepare($query);
            $sqlQuery->bindParam(':name', $username);
            $sqlQuery->bindParam(':email', $email);
            $sqlQuery->bindParam(':password', $encPassword);
            $sqlQuery->bindParam(':image', $filename);
            $sqlQuery->execute();

            header("Location: server.php?message=Registration successful!");
            exit;
        } else {
            header("Location: register.php?message=Failed to upload image.");
            exit;
        }
    } else {
        header("Location: register.php?message=Email already exists, choose another email.");
        exit;
    }
}

// Login process
if (isset($_POST["login"])) {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encPassword = md5($password);

    // Checking the email and password
    $str = "SELECT * FROM users WHERE email = :email AND password = :password";
    $query = $connection->prepare($str);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $encPassword);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // If the login is successful, set session variables and redirect to the profile page
        $_SESSION["name"] = $result["name"];
        header("Location: profile.php?id={$result['id']}&name={$result['name']}");
        exit;
    } else {
        header("Location: login.php?message=Wrong email or password");
        exit;
    }
}
?>
