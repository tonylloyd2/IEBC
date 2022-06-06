<?php
session_start();
include "databases/connectdb.php";
include  "functions.php";

if(isset($_POST['login'])){

  user_login($connectdb);
  
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in to your account</title>
    <link rel="stylesheet" href="css/passwordstyles.css">
</head>
<body>
<div class="main-wrapper">
  <div class="card-container">
      <div class="card">
          <div class="login-form">
              <div class="header"> <span class="text_login"> Log in</span>
              </div>
              <div class="content">
                  <form action="" method="post">
                      <div class="input-field" >
                          <input type="text" name="national_id" placeholder="IDENTIFICATION NUMBER ">
                      </div>
                      <div class="input-field">
                          <input type="password" name="password" placeholder="PASSWORD">
                      </div>
                      <div class="input-field">
                          <button class="btn btn-submit" name="login" type="submit"><i> Sign in </i></button>
                      </div>
                  </form>
              </div>
              <div class="footer">
                 <b class="text"><b> Don't have an account ?</b></b>
                  <a href="signup.php">
                  <button class="btn btn-signup" id="btn-signup"><em>Sign up</em></button>
                  </a>
                </div>
          </div> <!-- end login-form panel -->
             </div> <!-- end card -->
  </div> <!-- end card-container -->
</div>
</body>
</html>