<?php 
require "./config/config.php";
require "./config/authentication.php";
require "./form_handlers/db_functions.php";
require "./headers/header.php"; 

// check login before continuing
checkUser("index.php" ,"Must be logged in to view this content." );

//use any authenticated functions after this line
$results = getFilesFromUser($_SESSION['username'],$conn); //function that runs a call to files for all files relating t this perticualr user
$num_rows = mysqli_num_rows($results);
?>

<div class="bg-dark">

    <div class="files">
        <p class='left-pagination top-40'>You currently have <?php echo($num_rows); ?>  documents available to edit. If you want to create a new file, click the <a class='span-a' href="file.php?id=false">create</a> button to get started. </p>
        <?php 

        while ($row = mysqli_fetch_row($results)) {?>
        <a href="file.php?id=<?php echo($row[4]); ?>"><div class="file-card">
            <h3><?php echo($row[1]); ?></h3>
            <a href="file.php?id=<?php echo($row[4]); ?>">view document</a>
            <p>Last edited: <?php echo($row[5]); ?></p>
        </div></a> <?php } //end of php block ?> 

    </div>


    <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])){
            echo($_GET['error']);
    }?></p>

</div>
</body>
</html>