<?php 

include "databases/connectdb.php";
include  "functions.php";


 if(isset($_POST['signup'])){
  // if($_SERVER['REQUEST_METHOD']=='POST'){  
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
//   $userprofile = $_POST['userprofile'];

  if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
    echo "Only letters and white space allowed";
  }

$sql = "INSERT INTO test_table  VALUES ('$username', '$email', '$password')";
$result = mysqli_query($connectdb,$sql);


    if($result = true){
      echo "<script> 
      alert('registered successfully !!!');
      </script>
       ";
      


      $myfile = fopen("test.txt", "a") or die("Unable to open file!");
      $sql1 = "select * from test_table where username='{$username}' limit 1";
      $result =  mysqli_query($connectdb,$sql1);
      $user_data = mysqli_fetch_assoc($result);
      $write_data = "";
      $append = true;

      while ($append) {
      $write_data .= $user_data['username']." ";
      $write_data .= $user_data['email']." ";
      $write_data .= $user_data['password']." ";
      $append = false;
      }
      fwrite($myfile, $write_data."\n");
      header('Location:login.php');
    }
    else{
      echo "data is not inserted";
      header('Location:signup.php');
    }
 }


if(isset($_POST['login'])){
header("Location:login.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <title>signup</title>
  </head>
  <body>
    <h1 class="text-center my-4">SignUp to our website</h1>

    <div class="container">
   <form action="" class="col-md-6" method="Post">
     
    <div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" required class="form-control" id="username" name="username" placeholder="Enter your name">
</div>
    <div class="mb-3">
  <label for="password" class="form-label">email</label>
  <input type="email" required class="form-control" id="password" name="email" placeholder="Enter your email">
</div>
    <div class="mb-3">
  <label for="cpassword" class="form-label">password</label>
  <input type="password" required class="form-control" id="cpassword" name="password" placeholder="Enter your password">
</div>

<input type="file" class="form-control" name="userprofile"><br><br><br>
  <button type="submit" class="btn btn-primary"name="signup" >Signup</button>
  Already have an account? 
  
  <button type="submit" class="btn btn-primary" name="login">Login</button>
  
  </form>
</div>
    </div>
    
    <script src="dashboard/assets/js/core/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>