<?php 
require "../config/config.php";

$maxLengthOfID = 12;
$file_id = generateUniqueID($maxLengthOfID);

$max_file_size = 500000;
$file = $_FILES['file'];
$allowed_file_types = array("jpeg", "jpg", "png", "txt");
$file_destination = "../uploads/files/";
print_r($file);

$file_name = $file['name'];
$file_size = $file['size'];
$tmp_location = $file['tmp_name'];
$file_type = explode("/", $file['type']);
$file_type = strtolower($file_type[1]);

$newFileName = $file_id . $file_name;
$target_file = $file_destination . $newFileName;

$file_path_after = "files/" . $newFileName; 

if(in_array($file_type, $allowed_file_types)) {

    $upload_date = date("Y-m-d H:i:s"); 
    $username_washed = mysqli_real_escape_string($conn, $_POST['author_username']);

    $sql_check = "SELECT id FROM users WHERE username='$username_washed'";
    $user_results = mysqli_query($conn, $sql_check);
        if(mysqli_num_rows($user_results) == 1  ){
            
            $user = mysqli_fetch_row($user_results);
            $user_id = $user[0];
            $query = "INSERT INTO `uploads` (`id`, `author_username`, `author_id`,`upload_date`,`file_path`,`file_name`,`file_type`,`orig_name`) VALUES (NULL, '$username_washed', '$user_id','$upload_date','$file_path_after','$newFileName','$file_type','$file_name')";

            if(move_uploaded_file($tmp_location, $target_file) && mysqli_query($conn, $query)){
                $errorMsg = "Your file was successfully uploaded to our servers.";
                header("Location:../index.php?error=$errorMsg");
                exit;
            } else {
                $errorMsg = "Something went wrong uploading your file to our servers.";
                header("Location:../index.php?error=$errorMsg");
                exit;
            }
        } else {
            $errorMsg = "Something went wront finding your account.";
            header("Location: ../index.php?error=$errorMsg");
            exit;
        }
}  else {
    $errorMsg = "The file type you choose is not allowed";
    header("../index.php?error=$errorMsg");
    exit;
} // check if file is in allowed array

function generateUniqueID($requiredLength) {
    $rand_str = uniqid();

    while (strlen($rand_str) <= $requiredLength) {
        $rand_ints = rand(0, 9);
        $rand_str = $rand_str . $rand_ints;
    }
    return $rand_str;
}