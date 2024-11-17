<?php
session_start();
require "./db/connection.php";
require "./modules/addToCart.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/category.css">
    <link rel="stylesheet" href="./assets/css/products.css">
    <title>store</title>
</head>
<body>
    <?php
   
    $conn = connect();
        $query = "SELECT * , products.product_id FROM user_cart 
        JOIN products ON products.product_id = user_cart.product_id
        ";
        if($result = $conn->query($query)){
            $lines = $result->num_rows;
            $total = 0;
            $products = 0;
            while($lines > 0){
            $row = $result->fetch_assoc();
            $price = $row['price'];
            $quantity = $row['quantity'];
            $total += ($quantity * $price);
            $products += ($quantity);
            $lines --;
            }
        }
    ?>
    <header>
        <div class="header-right">
            <form class="search-bar" action="index.php" method="post">
                <input id="search" name="search" type="search" placeholder="search product" >
                <button name="submit_search"><img src="./assets/img/search-regular-24.png" alt=""></button>
            </form>
            <img id="site_logo" src="./assets/img/logo.18c1bd6e.webp" alt="">
        </div>
        
        <div class="header-left">
            <a href="./cart.php" id="cart-link">
                <div class="cart-span">
                    <span>تومان <?php echo "$total";?></span>
                    <span><?php echo "$products";?> محصول</span>
                </div>
                <div class="cart-container">
                    <img src="./assets/img/cart-regular-24 (1).png" alt="">
                </div>
                
            </a>
            <a href="./crud/login.php" id="login-link">
                <?php
                    
                    if(!empty($_SESSION['email'])){
                        $atIndex = strpos($_SESSION['email'] , '@');
                        $user_name = substr($_SESSION['email'] , 0 , $atIndex);
                        echo "<span>". $user_name."</span>";
                    }
                    else{
                        echo "<img src='./assets/img/user-regular-24.png'>";
                    }
                ?>
                
            </a>
        </div>
    </header>

    <section id="category-section">

    <?php
        $query = "SELECT * FROM categories";
        $result = $conn->query($query);
        $lines = $result->num_rows;
        if($result && $lines > 0){
            while($lines >0){
                $row = $result->fetch_assoc();
                $title = $row['title'];
                $str = $row['image'];
                if($str){
                    $image = substr($str, 1);
                }   
                else{
                    $image = null;
                }
                echo "
                <div>
                    <a href='index.php?filter=$title'>
                        <div class='product_image_container'>
                            <img src='$image' >
                        </div>
                        <h6 >". $title ."</h6>
                    </a>
                </div>";
                $lines --;
            }
            
        }
    ?>
        
       
    </section>

    <section class="product-section">
        <div>
            <div class="products-container">

            <?php
            if(isset($_GET['filter'])){
                $search = $_GET['filter'];
                $query = "SELECT * ,products.image as product_image , products.title as product_title , categories.title as category_title FROM products
                JOIN categories ON categories.category_id = products.category_id
                WHERE products.title LIKE '".$search."' OR categories.title LIKE '".$search."'";
            }
            else if(isset($_POST['submit_search'])){
                
                $search = $_POST['search'];
                $query = "SELECT * , products.image as product_image , products.title as product_title , categories.title as category_title FROM products
                JOIN categories ON categories.category_id = products.category_id
                WHERE products.title LIKE '%".$search."%' OR categories.title LIKE '".$search."'";
            }else{
                $query = "SELECT * , title as product_title , image as product_image FROM products";
            }
            
            $result = $conn->query($query);
            $lines = $result->num_rows;
            $temp_idx = $lines;
          
            if($result && $lines > 0){
                while($lines >0){
                $row = $result->fetch_assoc();
                $title = $row['product_title'];
                $str = $row['product_image'];
                $product_id = $row['product_id'];
                

                if($str){
                    $image = substr($str, 1);
                }   
                else{
                    $image = null;
                }
                $price = $row['price'];
                $desc = $row['description'];
                echo "<a>
                        <form id = 'product_form_".$product_id."' action='./index.php' method='post'>
                            <input type='hidden' name = 'product_id' value ='$product_id'>
                            <input type= 'hidden' name = 'title' value = '".$title."'>
                            <div class='product_image_container'>
                                <img src='$image' >
                            </div>
                            <div class='product_text_container'>
                                <h3 class='product_name' name='title'>$title</h3>
                                <span class='product_price'>$price تومان</span>
                            </div>
                            <button type='button' onClick={submitForm(".$product_id.")}>Add to cart</button>
                        </form>
                    </a>";

                $lines --;
                }
                }
                
                
                    if(isset($_POST['product_id'])){
                        echo "submit done";
                        $product_title = $_POST['title'];
                        $this_product_id = $_POST['product_id'];
                        if(empty($_SESSION['email'])){
                            header("Location: ../crud/login.php");
                        }
                        else{
                            $user_id = $_SESSION['user_id'];
                            $check_cart = "SELECT * FROM carts WHERE user_id = $user_id";
                            if($isCart = $conn->query($check_cart)){
                                if(!$row = $isCart->fetch_assoc()){
                                    $add_row = "INSERT INTO carts(user_id) VALUE($user_id)";
                                    $conn->query($add_row);
                                }
                                else{
                                    $get_cart_id = "SELECT cart_id FROM carts WHERE user_id = $user_id";
                                    $result = $conn->query($get_cart_id);
                                    $row = $result->fetch_assoc();
                                    $cart_id = $row['cart_id'];
    
                                    $check_product = "SELECT *  FROM user_cart
                                    WHERE user_cart.product_id = $this_product_id";
                                    $result = $conn->query($check_product);
                                    echo $result->num_rows;
                                    if($result->num_rows > 0){
                                        $add_quantity = "UPDATE user_cart SET quantity = quantity+1 WHERE product_id = $this_product_id";
                                        $result = $conn->query($add_quantity);
                                        echo "updated the existing product";
                                    }else{
                                        $add_product = "INSERT INTO user_cart(cart_id , product_id, quantity) VALUES($cart_id , $this_product_id , 1)";
                                        $result = $conn->query($add_product);
                                        echo "product has been added to your cart";
                                    }
                                   
                                }
                            }

                        }
                    }  
 
            ?>

            
            
            </div>
        </div>
    </section>

    <footer>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </footer>
</body>

<script>
    let mouseDown = false;
    let startX, scrollLeft;
    const slider = document.querySelector('.products-container');

    const startDragging = (e) => {
    mouseDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    }

    const stopDragging = (e) => {
    mouseDown = false;
    }

    const move = (e) => {
    e.preventDefault();
    if(!mouseDown) { return; }
    const x = e.pageX - slider.offsetLeft;
    const scroll = x - startX;
    slider.scrollLeft = scrollLeft - scroll;
    }

    // Add the event listeners
    slider.addEventListener('mousemove', move, false);
    slider.addEventListener('mousedown', startDragging, false);
    slider.addEventListener('mouseup', stopDragging, false);
    slider.addEventListener('mouseleave', stopDragging, false);
  
    function submitForm(productId) {
    document.getElementById('product_form_' + productId).submit();
}
</script>
</html>

