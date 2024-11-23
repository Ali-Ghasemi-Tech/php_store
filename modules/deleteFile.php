<?php

function deleteFile($id , $conn){
  $query = "SELECT * FROM content WHERE content_id = $id";
  $result = $conn -> query($query);
  $row = $result->fetch_assoc();
  $path = $row['path'];
  echo $path;
  $path = $_SERVER['DOCUMENT_ROOT'] . '/store/' . $path;
  unlink($path);
}

?>