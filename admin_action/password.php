<?php
session_start();
require "../databases/connectdb.php";
require  "../functions.php";

if(isset($_POST['submit'])){
$myfile = fopen("../databases/admin.txt", "a") or die("Unable to open file!");

admin_password_update($connectdb);


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
    <link rel="stylesheet" href="../css/passwordstyles.css">

</head>
<body>
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
<script>
    function show_pass(){
    var password = document.getElementById('password');
    if(password.type == 'password'){
        password.type = "text";
    }
    else if(password.type == 'text'){
        password.type = "password";
    }

    var confirm_password = document.getElementById('cpassword');
    if(confirm_password.type == 'password'){
        confirm_password.type = "text";
    }
    else if(confirm_password.type == 'text'){
        confirm_password.type = "password";
    }  

    var new_password = document.getElementById('new_password');
    if(new_password.type == 'password'){
        new_password.type = "text";
    }
    else if(new_password.type == 'text'){
        new_password.type = "password";
    }  
}
function validate_password(){
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('cpassword').value;


    //check empty password field  
  if(password == "" || confirm_password =="" ) {  
      alert("**Fill the password please!");
      location.replace('./password.php');
  }  
  if(password.length < 5 || password.length > 20 ) {  
       alert("**Password length must be atleast 7 characters and atmost 20 characters" );
       location.replace('./password.php');
 }
 if (password != confirm_password) {
     alert("passwords didnt match");
     location.replace('./password.php');
 }
 if (password == confirm_password){
     alert("registration complete !!")
     alert("you will be redirected to login page")
     return true;
 }

}
</script>
</body>
</html>