<?php

function addProduct($user_id , $product_id , $conn){
  $check = "SELECT quantity FROM user_cart WHERE user_id =". $user_id. "JOIN carts ON carts.cart_id = user_cart = user_cart.cart_id";
  if($result = $conn->query($check)){
    if($row = $result->fetch_assoc()){
      if($row['quantity'] != 0){
      $quantity = $row['quantity'];
      $quantity += 1
      $query = "ALTER ROW UPDATE quantity". $quantity
      }
      else{ 
         $query = "INSERT INTO user_cart(cart_id , product_id) VALUE($user_id , $product_id)";
      }
    }
  }
  if($result = $conn->query($query)){
    echo "added to cart";
  }
  else{
    echo "couldn't add to cart";
  }
}

?>
