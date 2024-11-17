<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/style.css" rel="stylesheet">
</head>
<body>
<main id="main" class="main">
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Cart</h5>

      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">image</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require "./db/connection.php";
            $conn = connect();
            $query = "SELECT * , products.product_id FROM user_cart 
            JOIN products ON products.product_id = user_cart.product_id
            ";
            if($result = $conn->query($query)){
              $lines = $result->num_rows;
              $total = 0;
              while($lines > 0){
                $row = $result->fetch_assoc();
                $str = $row['image'];
                $title = $row['title'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $total += ($quantity * $price);
                if($str){
                  $image = substr($str, 1);
                }   
                else{
                    $image = "null";
                }

                echo "<tr class='cart-list'>
                          <td> ".$title. "</td>
                          <td> " .$price . "</td>
                          <td> " .$quantity . "</td>
                          </td>
                          <td><image style='width: auto; height: 50px;' class='image' src='$image'></td>
                      </tr>";

                $lines --;
              }
            }
          ?>

        </tbody>
      </table>
      <div><span>total:</span><?php echo "$total"?></div>
      <button class="btn btn-primary">purchase</button>
    </div>

  </div>

 
</div>
</div><!-- End Recent Sales -->
          </main>
</body>
</html>



