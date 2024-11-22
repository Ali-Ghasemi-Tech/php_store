<?php
require "../connection.php";
$conn= connect();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM content WHERE content_id = $id";
  $conn->query($query);
  header("Location: ../../panel/content_management.php");
}

?>