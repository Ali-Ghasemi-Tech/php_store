<?php
require "connection.php";
$conn = connect();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE product_id = ".$id;
    $get_query = "SELECT * FROM products WHERE product_id = ".$id;
    $result = $conn->query($get_query);
    $row = $result->fetch_assoc();

    if($conn->query($query)){
       
        header('Location: ../panel/products_panel.php');
        echo "your category has been removed succesfully.";
    }
    else{
        echo "ERROR" .$query . "<br>" .$conn->error;
    }
}
echo "didnt run";
$conn->close();
?>