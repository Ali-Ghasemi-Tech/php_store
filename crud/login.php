<?php
  require "../db/connection.php";
  $conn = connect();
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if(!empty($email) && !empty($pass)){
      $query = "SELECT * FROM users WHERE email= '".$email."' AND password = '".$pass."'";
      if($result =  $conn->query($query)){
        if($row = $result->fetch_assoc()){
          
          if($row['role'] = 1){
            echo "welcome user" .$email;
            header("Location: ../index.php");
          }
          else if($row['role'] = 0){
            echo "welcome admin " .$email;
            header("Loaction: ../panel/dashboard.php");
          }
          else{
            echo "undefined role";
          }
        }
        else{
          echo "<div>wrong email or password</div>";
        }
      }
      else{
        echo "there was a problem connecting to the database";
      }
      
    }
  }
  else if(isset($_POST['signup'])){
    header("Location: ./signup.php");
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
  <form calss="login-container" method="post" action="login.php">
    <h1>Login</h1>
    <div>
      email: <input require placeholder="abcd@example.com" name="email" type="email">
    </div>
    <div>
      password: <input require type="password" placeholder="please enter your password" name="password">
    </div>
    
    <div>
      <input type="submit" name="login" value="login">
      <input type="submit" name="signup" value = "signup">
    </div>
    
  </form>
</body>
</html>

