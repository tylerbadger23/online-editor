<?php
require "../config/config.php";
//make sure data is passed into fields correctly and securely
//data to filter: email, password,password2,   create username from email

$email = mysqli_real_escape_string($conn, $_POST['reg_email']);
$email = strtolower($email);
$password = mysqli_real_escape_string($conn, $_POST['reg_pw']);
$password2 = mysqli_real_escape_string($conn, $_POST['reg_pw2']);
$username = mysqli_real_escape_string($conn, $_POST['reg_username']);

//PASSWORD CHECKS
if($password !== $password2) {
    $errorMsg = "Passwords do not match. Please make sure they are identical";
    header("Location: ../register.php?error=$errorMsg");
    exit;
} else if (strlen($password) < 4 || strlen($password2) < 4){
    $errorMsg = "Password is too short. Must be longer than 4 characters.";
    header("Location: ../register.php?error=$errorMsg");
    exit;
}

if (strlen($email) < 5){
    $errorMsg = "Password is too short. Must be longer than 4 characters.";
    header("Location: ../register.php?error=$errorMsg");
    exit;
}

if (strlen($username) < 4 || strlen($username) > 16){
    $errorMsg = "Your username must be between 4 and 16 characters";
    header("Location: ../register.php?error=$errorMsg");
    exit;
}

// check username availability


$hashed_password = md5($password);
//filter data BEFORE PUBLISHING

$selectQuery = "SELECT id FROM users WHERE email='$email'";
$results = mysqli_query($conn, $selectQuery);

$username_check_query = "SELECT id FROM users WHERE username='$username'";
$username_query_results = mysqli_query($conn, $username_check_query);

if(mysqli_num_rows($results) > 0) {
    $errorMsg = "This email is already taken. Please try logging in instread.";
    header("Location: ../register.php?error=$errorMsg");
    exit;
} else if(mysqli_num_rows($username_query_results) > 0) {
    $errorMsg = "username is  already taken. Please choose another one";
    header("Location: ../register.php?error=$errorMsg");
    exit;
} else {
    $query = "INSERT INTO `users` (`id`, `email`, `password`,`username`) VALUES (NULL, '$email', '$hashed_password','$username')";
    if(mysqli_query($conn, $query)){
        $successMsg = "Successfully Created New Account";
        $_SESSION['username'] = $username;
        header("Location: ../index.php?s=$successMsg");
        exit;
    }
    echo("Phase 3 Completed");
}

