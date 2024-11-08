<?php
require "../db/connection.php";
$conn = connect();
function addProduct($user_id , $product_id){
  $query = "INSERT INTO user_products(user_id , product_id) VALUE($user_id , $product_id)";
  if($result = $conn->query($query)){
    echo "added to cart";
  }
  else{
    echo "couldn't add to cart";
  }
} 
?>