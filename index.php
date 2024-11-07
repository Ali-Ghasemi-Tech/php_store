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
    require "./db/connection.php";
    $conn = connect();
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
            <a href="" id="cart-link">
                <div class="cart-span">
                    <span>تومان 0</span>
                    <span>0 محصول</span>
                </div>
                <div class="cart-container">
                    <img src="./assets/img/cart-regular-24 (1).png" alt="">
                </div>
                
            </a>
            <a href="./crud/login.php" id="login-link">
                <img src="./assets/img/user-regular-24.png" alt="">
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
            if($result && $lines > 0){
                while($lines >0){
                $row = $result->fetch_assoc();
                $title = $row['product_title'];
                $str = $row['product_image'];
                if($str){
                    $image = substr($str, 1);
                }   
                else{
                    $image = null;
                }
                $price = $row['price'];
                $desc = $row['description'];
                echo "<a> 
                        <div class='product_image_container'>
                            <img src='$image' >
                        </div>
                        <div class='product_text_container'>
                            <h3 class='product_name'>$title</h3>
                            <span class='product_price'>$price تومان</span>
                        </div> 
                    </a>";

                $lines --;
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
  
    function submitForm(form) {
        form.submit();
    }
</script>
</html>