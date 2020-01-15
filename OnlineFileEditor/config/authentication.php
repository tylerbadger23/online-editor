<?php

function checkUser($redirectToFile, $errorMsg) { //checks session for user returns true is true false if false
    if($_SESSION['username']){
        $username = $_SESSION['username'];
        return true;
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
    
