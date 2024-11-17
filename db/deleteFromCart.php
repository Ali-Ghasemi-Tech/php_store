<?php
require "connection.php";
$conn = connect();
if(isset($_POST['add'])){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "UPDATE user_cart 
    SET quantity = quantity + 1 
    WHERE product_id =".$id;
    $result = $conn->query($query);

  }
}
else if(isset($_POST['remove'])){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT * FROM user_cart WHERE product_id= ".$id;
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if($row['quantity'] == 1 ){
      $query = "DELETE FROM user_cart WHERE product_id =".$id;
      $conn->query($query);
    }
    else{
      $query = "UPDATE user_cart 
      SET quantity = quantity - 1 
      WHERE product_id =".$id;
      $result = $conn->query($query);
    }
    }
   
}
header("Location: ../cart.php");
?>