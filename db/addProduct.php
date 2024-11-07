<?php
require 'connection.php';
require '../modules/save_image.php';
$conn = connect();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Call save_image to upload and get the image path
    $image_path = save_image();

    if ($image_path) { // Check if image was uploaded successfully
        // SQL query to insert product data
        $stmt = $conn->prepare("INSERT INTO products (title, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdis", $title, $description, $price, $category_id, $image_path);

        if ($stmt->execute()) {
           header("Location: ../panel/products_panel.php")
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
