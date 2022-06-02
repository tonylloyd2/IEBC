<?php
session_start();
include 'setup_db.php';
if(isset($_POST['continue'])  ){
setup_db();
header("location:index2.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration : </title>
    <link rel="stylesheet" href="../../css/passwordstyles.css">
    
</head>
<body>

   
<div class="main-wrapper">
  <div class="card-container">
      <div class="card">
          <div class="login-form">
              <div class="header"> <span class="text_login"> Database configuration : </span>
              </div>
              <div class="content">
                  <form action="" method="post">
                      <div class="input-field" >
                          <input type="text" name="host" placeholder="localhost" value="localhost">
                      </div>
                      <div class="input-field">
                          <input type="text" name="username_db" placeholder="username">
                      </div>
                      <div class="input-field" >
                          <input type="password" name="password_db" placeholder="Password :"value="" >
                      </div>
                      <div class="input-field">
                          <input type="password" name="name_db" placeholder="Database Name">
                      </div>
                      <div class="input-field">
                          <button class="btn btn-submit" name="continue" onclick="instruct()" type="submit"><i> Continue </i></button>
                      </div>
                  </form>
              </div>
              <div class="footer">
                   <!-- <a href="signup.php"> -->
                  <!-- <button class="btn btn-signup" id="btn-signup" onclick="signup()"><em>Sign up</em></button> -->
                  <!-- </a> -->
                </div>
          </div> <!-- end login-form panel -->
             </div> <!-- end card -->
  </div> <!-- end card-container -->
</div>
<script src="../../admin_action/signup.js"></script>
<script>
       function instruct(){
       alert("for username and password if not configured leave blank to take parameters root and null password respectively");
       die;
    }
   </script>
</body>
</html>