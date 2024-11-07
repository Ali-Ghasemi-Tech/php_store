<?php
require "connection.php";
require "../modules/save_image.php";
$conn = connect();
$id = null;
if(isset($_POST['product_id'])){
  $id = intval($_POST['product_id']);
  $query = "SELECT title , description , price , category_id , image FROM products WHERE product_id=". $id;
  $result = $conn->query($query);
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $category_id = $row['category_id'];
    $image = $row['image'];
} else {
    echo "No product found with this ID.";
}
  
  
}

if(isset($_POST['submit'])){
    if($id === null){
      die('invalid ID');
    }
    $new_title = $_POST['title'];
    $new_desc = $_POST['description'];
    $new_price = $_POST['price'];
    $new_category_id =$_POST['category_id'];
    $new_img = save_image($image);
    if(!empty($new_title)|| !empty($new_desc) || !empty($new_price)){
      $editQuery = "UPDATE products SET 
                  title = '" . $new_title . "', 
                  description = '" . $new_desc . "', 
                  price = '" . $new_price . "',
                  category_id = '".$new_category_id ."',
                  image = '".$new_img ."'
                WHERE product_id = " . $id;
      
      
      if($conn->query($editQuery)) {
        header("Location: ../panel/products_panel.php");
    } else {
        echo "Update failed: " . $conn->error; 
    }
  
    }
  }
$conn->close();
?>


