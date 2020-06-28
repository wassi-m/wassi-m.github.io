<?php
include "connect.php";
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["songfile"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(!isset($_POST["submit"]))
    echo "ERROR 404. Page Not Found";


// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['message'] = "Sorry, file already exists. Rename your file and try again. ";
  $uploadOk = 0;
  $_SESSION['ok']=0;
  header('location: request.php'); 
  exit;
}

// Check file size
if ($_FILES["songfile"]["size"] > 200000000) {
  $_SESSION['message'] = "Sorry, your file is too large. ";
  $uploadOk = 0;
  $_SESSION['ok']=0;
  header('location: request.php'); 
  exit;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['message'] = "Sorry, your file was not uploaded. Failed to create request";
// if everything is ok, try to upload file
} else {
    $lyrics=str_replace ("'","''", $_POST["lyrics"]);
    $title=str_replace ("'","''", $_POST["song"]);
    $artist=str_replace ("'","''", $_POST["artist"]);
    $filename=str_replace ("'","''", basename($_FILES["songfile"]["name"]));
    
    $query = "INSERT INTO `requests`( `user_id`,`title`, `artist`, `lyrics`, `filename`) VALUES (".$_SESSION['id'].",'$title','$artist','$lyrics','$filename')";

  if (move_uploaded_file($_FILES["songfile"]["tmp_name"], $target_file) && mysqli_query($connect, $query)) {
    
      $_SESSION['message'] = "Request created successfully. ";
      $_SESSION['ok']=1;
      header('location: request.php'); 
      exit;
            } else {
              $_SESSION['message'] = "Sorry, there was an error uploading your file. <br>Error Code: " . mysqli_error($connect) . "<br> Please try again later. ";
              $_SESSION['ok']=0;
              header('location: request.php'); 
              "Error Code: " . mysqli_error($connect) . "<br> Please try again later. ";
            }
}

mysqli_close($connect);

?>