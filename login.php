<?php
session_start();


if(!empty($_SESSION['validate'])){
    $_SESSION['validate'] = '';
    ?>
    <script>
          window.addEventListener('load', function(){
          swal("Login Error", "Username does not exists", "warning");});
    </script>
  <?php

}else{
    $_SESSION['validate'] = '';
}


   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>DCPM Login</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/aa867b86c2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/aa867b86c2.js" crossorigin="anonymous"></script>

    <script src="javascript/sweetalert.js"></script>
    <link rel="stylesheet" href="Styles/login.css">
    </head>
    <body>
        <div class="main-container">
        <div class="login-container">
            <div class="login-header-container">
            <p>DCP MONITORING</p>
            <i class="fa-solid fa-users fa-7x"style="color: #ffffff;"></i>
         
            <p>SIGN IN</p>
            </div>
            <form action="UserValidation" method="post">
            <div class="login-input-container">
                <label class="" for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="" autocomplete="off"> 
                <label class="" for="password">Password</label>
                <input type="password" name="userpass" id="userpass" placeholder="" autocomplete="off">
                <a class="forgotpasswordlink" href="">Forgot password?</a>
            </div>
           

            <div class="login-button-container">
                <button type="submit">SIGN IN</button>
            </div>
            </form>
            
      
      </div>
      <div class="logo-main-container">
          <div class="logo-container">
          <img src="deped.png" alt="Avatar" class="image">
          </div>

      </div>
        </div>
        


       
        
    </body>
</html>