<?php
require "connection.php";
require "../modules/save_image.php";
$conn = connect();
$id = null;
if(isset($_POST['category_id'])){
  $id = intval($_POST['category_id']);
  $query = "SELECT title , image FROM categories WHERE category_id=". $id;
  $result = $conn->query($query);
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $image = $row['image'];
} else {
    echo "No category found with this ID.";
}
  
  
}

if(isset($_POST['submit'])){
    if($id === null){
      die('invalid ID');
    }
    $new_title = $_POST['title'];
    $new_image = save_image($image);
    if(!empty($new_title)){
      $editQuery = "UPDATE categories SET title ='" .$new_title. "' , image= '".$new_image."'  WHERE category_id =".$id;
      
      
      if($conn->query($editQuery)) {
        header("Location: ../panel/category_panel.php");
    } else {
        echo "Update failed: " . $conn->error; 
    }
  
    }
  }
$conn->close();
?>


