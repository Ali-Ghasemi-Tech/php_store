<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

function save_file($format){
  $target_dir = "../../assets/uploads/";
  switch($format){
    case "webp":
      $target_dir = $target_dir . "image/";
      break;
    case "mp4":
      $target_dir = $target_dir . "video/";
      break;
    case "jpeg":
      $target_dir = $target_dir . "image/";
      break;
    case "mp3":
      $target_dir = $target_dir . "audio/";
      break;
    default:
      $target_dir = $target_dir . "dump/";
      break;
  }
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $tmp = $_FILES['file']['tmp_name'];
  
    
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file." . $_FILES['file']['error'];
    }
  }
  return $target_file;
    
}
// header("Location: ../panel/content_management.php");

  
?>