<?php
require "../config/config.php";
//make sure data is passed into fields correctly and securely
//data to filter: email, password,password2,   create username from email

$email = mysqli_real_escape_string($conn, $_POST['reg_email']);
$email = strtolower($email);
$password = mysqli_real_escape_string($conn, $_POST['reg_pw']);
$password2 = mysqli_real_escape_string($conn, $_POST['reg_pw2']);

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

$username_arr = explode('@', strtolower($email));
$username = $username_arr[0];

$hashed_password = md5($password);
//filter data BEFORE PUBLISHING

$selectQuery = "SELECT * FROM users WHERE email='$email'";
$results = mysqli_query($conn, $selectQuery);

if(mysqli_num_rows($results) > 0) {
    $errorMsg = "User already exists. Plese try logging in instread. ";
    header("Location: ../register.php?error=$errorMsg");
    echo("Phase 2 Completed");
    exit;
} else {
    $query = "INSERT INTO `users` (`id`, `email`, `password`,`username`) VALUES (NULL, '$email', '$hashed_password','$username')";
    if(mysqli_query($conn, $query)){
        $errorMsg = "Successfully Created New Account";
        header("Location: ../index.php?s=$errorMsg");
        exit;
    }
    echo("Phase 3 Completed");
}

