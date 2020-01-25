<?php 
require "./config/config.php";// must be on top
require "./form_handlers/db_functions.php";
require "./config/authentication.php";
require "./headers/header.php"; 

// check login before continuing
checkUser("index.php" ,"Must be logged in to view this content.", $conn);

if(isset($_GET['id']) && strlen($_GET['id']) === 15) {
    $result = getFileDataFromUser($_GET['id'], $conn);
    $document = mysqli_fetch_row($result);
}

//ifile value check
?>

<div id="deleteModal" class='modal'>
    <div class="modal-content">
        <form action="./form_handlers/delete_file.php" method="post" id='text-area-div'>
            <h3 class='modal-h'>You are about to delete <span class='modal-f-name'><?php if(isset($document[1])){
                echo($document[1]);
            } else {
                echo("Unsaved File");
            }
        ?></span></h3>
            <p class='modal-p'>This action cannot be un-done. Are you sure you want to continue?</p>
            <input id='delete-btn' type="submit" value='Delete'>
            <input type="hidden" name="file_id" value='<?php  echo($_GET['id']); ?>'>
            <input type="hidden" name="real_id" value='<?php if(isset($document[0])){
                echo($document[0]);
            } else {
                echo(false); // echo false to signify its a brand new file and delete it
            };?>'>
        </form>
        <button class='close' id='cancel-d'>Cancel</button>
    </div>
</div>

<div class="bg-light">

    
    <form action="./form_handlers/save_file.php" method="post" id='text-area-div'>
        <input class='file-title' type="text" name="file_name" id="file_name" value='<?php if(isset($document[1])){
                echo($document[1]);
            } else {
                echo("New File || Un-named");
            }
        ?>'>


        <textarea name='file_contents' class='editor-bg' id='editor'><?php if(isset($document[3])){
            print_r($document[3]); };?></textarea>
       <p>Last saved: <?php if(isset($document[3])){
           echo($document[5]);
       } else {
           echo("never");
       } ?></p>
       <input type="hidden" name="file_id" value='<?php  echo($_GET['id']); ?>'>
        <input type="hidden" name="username" value='<?php if(isset($document[2])){
            echo($document[2]);
        } else {
            echo($_SESSION['username']);
        };?>'>
        <input id='save-btn' type="submit" value='Save'>
    </form>

    <div class='width-90'>
        <button id='delete-modal' class='delete-btn'>Delete</button>
    </div>
</div>

<!-- <script src="./design/modal.js"> -->
<script src="./design/modal.js"></script>
<script>  new FroalaEditor('textarea');</script>
</body>
</html>