<?php 
require "./config/config.php";
require "./config/authentication.php";
require "./form_handlers/db_functions.php";
require "./headers/header.php"; 

// check login before continuing
checkUser("index.php" ,"Must be logged in to view this content.",$conn );

//use any authenticated functions after this line
$results = getFilesFromUser($_SESSION['username'],$conn); //function that runs a call to files for all files relating t this perticualr user
$num_rows = mysqli_num_rows($results);
?>

<h2>Account settings for: <?php echo($_SESSION['username']);?></h2>


</body>
</html>