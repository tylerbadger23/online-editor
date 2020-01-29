<?php

function getFilesFromUser($username,$conn) {
    $select_query = "SELECT * FROM `files` WHERE author_un='$username'";
    $results = mysqli_query($conn, $select_query);

    return $results;
}

function getUploadsFromUser($username, $conn) {
    $select_query = "SELECT * FROM `uploads` WHERE author_username='$username'";
    $results_upload = mysqli_query($conn, $select_query);

    return $results_upload;
}


function getFileDataFromUser ($id, $conn) {
    if(isset($id)) {
        $id_filtered = mysqli_real_escape_string($conn, $id);
        $get_file_contents = "SELECT * FROM `files` WHERE unique_id='$id_filtered'";
        $result = mysqli_query($conn, $get_file_contents);
        
        return $result;
    }
}
