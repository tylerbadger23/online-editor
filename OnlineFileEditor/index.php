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



<div class="bg-light">

    <div class="files">
        <h2 class='recent-files'>Recently Edited</h2>
        <div class="ui cards"><?php 
        while ($row = mysqli_fetch_row($results)) {?>
            <div class="card" >
            <div class="content">
                <a href="file.php?id=<?php echo($row[4]); ?>" class="header"><?php echo($row[1]); ?></a>
                <div class="meta">Last Change: <?php echo($row[5]); ?></div>
            </div>
        </div> <?php } ?>
        
    </div>

    <a href="file.php?id=false" id='create-new-file' class="ui primary button">Create</a>
    <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])) {
            echo($_GET['error']);
    } ?></p>

</div>

</body>
</html>