<?php
  require "../modules/check_pass.php";
  require "../db/connection.php";
  $conn = connect();
  if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repeat =$_POST['repeat_pass'];
    
    if(!empty($email) && !empty($pass)){
      $check = check_pass($pass , $repeat);
      if($check[0]){
        $query = "SELECT * FROM users WHERE email= '".$email ."'";
        if($exist = $conn->query($query)){
          if($exist->fetch_assoc()){
            echo "an account already exists with this email";
          }
          else{
          $query = "INSERT INTO users(email , password , role) VALUES('".$email."' , '".$pass."' ,1)"; 
          if($result = $conn->query($query)){
              echo "your account has been created successfuly";
              header("Location: ./login.php");
            }
            else{
              echo "there is an account created with this email";
              }
          }
        }
      
        else{
          echo "there was a problem connecting to the database";
        }
      }
      else{
        echo $check[1];
      }
      
    }
  }
  else if(isset($_POST['login'])){
    header("Location: ./login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <form calss="login-container" method="post" action="signup.php">
    <h1>Signup</h1>
    <div>
      email: <input require placeholder="abcd@example.com" name="email" type="email">
    </div>
    <div>
      password: <input require type="password" placeholder="please enter your password" name="password">
      repeat password: <input type="password" name="repeat_pass" placeholder="please repeat the password above">
    </div>
    
    <div>
      <input type="submit" name="login" value="login">
      <input type="submit" name="signup" value = "signup">
    </div>
    
  </form>
</body>
</html>

