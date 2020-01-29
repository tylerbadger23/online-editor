<?php 
require "./config/config.php";
require "./config/authentication.php";
require "./config/helper_functions.php";
require "./form_handlers/db_functions.php";
require "./headers/header.php"; 

// check login before continuing
checkUser("index.php" ,"Must be logged in to view this content.", $conn);

//use any authenticated functions after this line
$results_files = getFilesFromUser($_SESSION['username'],$conn); 
$results_uploads = getUploadsFromUser($_SESSION['username'],$conn); //function that runs a call to files for all files relating t this perticualr user
$num_rows = mysqli_num_rows($results_files);
?>



<div class="bg-light">

    <div class="files">
        <h2 class='recent-files'>Recently Edited</h2>

        <a href="file.php?id=false" id='create-new-file' class="ui primary button">Create</a>
        <button id='upload-file-btn' class="ui secondary button">Upload</button>
        <p class='error-msg' style='color:red'><?php if(isset($_GET['error'])) {
                echo($_GET['error']);
        } ?></p>


        <div class="ui cards"><?php 
        while ($row = mysqli_fetch_row($results_files)) {?>
            <div class="card" >
            <div class="content">
                <a href="file.php?id=<?php echo($row[4]); ?>" class="header"><?php echo(showShortString($row[1], 32));?></a>
                <div class="meta">Last Change: <?php echo($row[5]); ?></div>
            </div>
        </div> <?php } ?></div>
        <div class="ui cards"><?php 
        while ($row = mysqli_fetch_row($results_uploads)) {?>
            <div class="card upload-card" >
                <div class="content">
                    <a href='./uploads/<?php echo($row[4]); ?>' class="header left header-txt"><?php echo($row[7]);?></a>
                    <div class="meta left">Uploaded: <?php echo($row[3]); ?></div>
                    <p class='meta left'>Type: <?php echo($row[6]); ?></p>
                </div>
             </div> 
        <?php } ?>
        </div>
        
    <div id="uploadModal" class='modal_upload'>
    <div class="modal-content-upload">
    
        <form action="./form_handlers/upload_file.php" method="post" enctype="multipart/form-data">
            <h2 class='header-upload-modal'>Upload a File</h2>
            <input type="hidden" name="author_username" value='<?php echo($_SESSION['username']);?>'>
            <p class='upload-p'>Choose a file to upload and store on the cloud.</p>
            <label for="upload_input"  class='ui primary button'>
                <span class="glyphicon glyphicon-folder-open" aria-hidden="true">Choose</span>
                <input type="file" id="upload_input" name='file' style="display:none" required>
            </label>
            <label for="close"  class='ui button secondary'>
                <span>Cancel</span>
            </label>
            <br>
            <button class='button positive ui' id='submit-btn' type="submit">Upload</button>
        </form>
        <button style='display:none;' id='close'></button>
    </div>
</div>

</div>

<script src="./design/upload_modal.js"></script>
</body>
</html>