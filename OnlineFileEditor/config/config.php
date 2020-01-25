<?php
session_start();

$user = 'root';
$password = 'root';
$db = 'onlineeditor';
$host = 'localhost';
$port = 8889;

$conn = new mysqli($host,$user,$password,$db);

$file_name = $_SERVER['PHP_SELF'];

function displayTitle($s_self) {


switch ($s_self) {
    case "index.php":
        $title =  "View Your Projects";
        break;
    case "login.php":
        $title =  "Sign In To Use Features";
        break;
    case "register.php":
        $title = "Sign Up For A Account Today";
        break;
    case "file.php":
        $title =  "Viewing File";
        break;
    case "settings.php":
        $title =  "Customize Your Editors Settings";
        break;
    case "account.php":
        $title = "View & Change Account Settings";
        break;
    }
    
    return "$title";
}

?>