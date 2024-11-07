<?php
require 'connection.php';
require '../modules/save_image.php';

$conn = connect();

$title = $_POST['title'];
$image = save_image();

$sql = "INSERT INTO categories(title, image) VALUES ('$title', '$image')";

if ($conn->query($sql) === TRUE) {
 header('Location: ../panel/category_panel.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>