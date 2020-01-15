<?php
require "../config/config.php";

$redirect_after = $_POST['redirect'];
$email = mysqli_real_escape_string($conn, $_POST['log_email']);
$password = mysqli_real_escape_string($conn, $_POST['log_pw']);

$pw = md5($password);

$sql = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$pw'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) === 1) {

    $user = mysqli_fetch_row($result);
    $_SESSION['username'] = $user[3];// user index 3 goes to username in db
    header("Location: ../$redirect_after");
    exit;
    
    
} else { // allow user to easily return to login page with proper redirect links
    $errorMsg = "Password or email was not correct. Try again.";
    $redirectToFile = $redirect_after;
    header("Location: ../login.php?error=$errorMsg&rp=$redirectToFile");
    exit;
}