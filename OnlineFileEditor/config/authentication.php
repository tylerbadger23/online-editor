<?php

function checkUser($redirectToFile, $errorMsg,$conn) { //checks session for user returns true is true false if false
    if($_SESSION['username']){
        $username_washed = mysqli_real_escape_string($conn, $_SESSION['username']);

        $sql_check = "SELECT * FROM users WHERE username='$username_washed'";
        $results = mysqli_query($conn, $sql_check);
        if(mysqli_num_rows($results) == 1  ){
            return true;
        } else {
            header("Location: ./login.php?r=$errorMsg&rp=$redirectToFile");
            exit;
        }
    } else {
        header("Location: ./login.php?r=$errorMsg&rp=$redirectToFile");
        exit;
    }
}

function generateUniqueID($requiredLength) {
    $rand_str = uniqid();

    while (strlen($rand_str) !== $requiredLength) {
        $rand_ints = rand(0, 9);
        $rand_str = $rand_str . $rand_ints;
    }

    return $rand_str;
}
    
