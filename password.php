<?php
session_start();
require "databases/connectdb.php";
require  "functions.php";

if(isset($_POST['submit'])){
$myfile = fopen("test.txt", "a") or die("Unable to open file!");

user_password_update($connectdb);


// if (isset($_SESSION['national_id'])){
//   }
  echo("<script>
   alert('not inserted in file ');
  </script>
  ");

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your own password </title>
    <link rel="stylesheet" href="css/passwordstyles.css">

</head>
<body>
    
<!-- <script>
    alert(' registration was successfull ');
    alert('We recommend you create your own password ');          
</script> -->
<div class="main-wrapper">
  
  <div class="card-container">
      <div class="card">
          <div class="login-form">
              <div class="header">Create Your Password</div>
              <div class="content">
                  <form action="" method="post">
                      <div class="input-field" >
                          <input type="text" id="id_number" name="national_id" placeholder="Enter the registered ID NO ">
                      </div>
                      <div class="input-field" >
                          <input type="password" id="password" name="fpassword" placeholder="ENTER PASSWORD">
                      </div>
                      <div class="input-field">
                          <input type="password" id="cpassword" name="spassword" placeholder="CORNFIRM PASSWORD">
                      </div>
                      <div class="input-field">
                          <button class="btn btn-submit" type="submit" name="submit" onclick="validate_password()" >Submit</button>
                      </div>
                      <div class="checkbox"  style="padding-left: 30px;">
                         <input type="checkbox" onclick="show_pass()"><b> Show Password</b>
                        </div>
                  </form>
                
            </div> <!-- end login-form panel -->
             </div> <!-- end card -->
             
  </div> <!-- end card-container -->
<script src="javascript/showpass.js"></script>
</body>
</html>