<?php
require "../connection.php";
require "../../modules/addFile.php";
$conn = connect();
if(isset($_POST['submit'])){
  if($_FILES['file']['size'] / 1000000 > 10){
    die('file is way to big');
  }
  else{
  $file = $_FILES['file']['name'];
  $name = strtok($file , '.');
  $format = substr($file , strpos($file , '.') + 1 );
  $file_path = save_file($format);
  echo $file_path;
  $file_path = substr($file_path , 6);
  $size = $_FILES['file']['size'];
  if($file_path){
    $query = "INSERT INTO content(name , size , format , path) VALUES('$name' , $size , '$format' , '$file_path')";
    $result = $conn->query($query);
  }
  
}
header("Location: ../../panel/content_management.php");
}
?>