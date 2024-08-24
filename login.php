<?php
include "db.php";
session_start();
if(isset($_POST["name"]) && isset($_POST["phone"])){
  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
  if($rq=mysqli_query($db,$q)){
    if(mysqli_num_rows($rq)==1){
      $_SESSION["userName"]=$name;
      $_SESSION["phone"]=$phone;
      header("location: index.php");
    }else{
      $q="SELECT * FROM `users` WHERE phone='$phone'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo "<script>alert($phone+' is already taken by another person')</script>";
        }else{
          $q="INSERT INTO `users`(`uname`, `phone`) VALUES ('$name','$phone')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){
                $_SESSION["userName"]=$name;
                $_SESSION["phone"]=$phone;
                header("Location: index.php");
              }
            }
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>ChatRoom</h1>
    <div class="login">
        <h2>Login</h2>
        <p>This ChatRoom is the best example 
           to demonstrate the concept of a ChatBot and 
           is a great skillset for beginners.
        </p>
        <form action="" method="POST">
            <h3>UserName</h3>
            <input type="text" placeholder="Short Name" name="name" required>
            <h3>Mobile No</h3>
            <input type="number" placeholder="With Country Code" name="phone" min="1111111111" max="9999999999999" required>
            <button type="submit">Log/Register</button>
        </form>
    </div>
</body>
</html>
