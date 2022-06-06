<?php
session_start();
require "../../databases/connectdb.php";
require  "../../functions.php";

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

include "./header_nav.php";
?>

 <div class="panel-header panel-header-lg">
            <div>
            <b><u><p style="color:white; padding-left:10px">Create your Password</p></u></b>
            </div>
        <canvas> -->
      </canvas>
      </div>
      <div class="main-wrapper">
  
      <div class="content" style="padding-left: 20%;">
        <div class="row">
        <!-- sign up form -->
        <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="border-radius:10px;border-style: hidden;">           
              <div class="card-header">
                <h5 class="title">Create password</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>National id</label>
                        <input type="text" class="form-control"placeholder="national id" name="national_id">
                      </div>
                    </div><br>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                      </div>
                    </div><br>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="email">
                      </div>
                    </div>
                   </div>
            </div> 
          </div>  
        </div>  
        </div>       
        </form>
        </div>
      </div>
      </div>
<br><br><br><br><br><br><br>

<script src="../../javascript/showpass.js"></script>

<style>
  footer{
    /* position: fixed; */
    margin-bottom: 0%;
    left: 0;
    bottom: 0;
    

  }
</style>

 <?php
 include "./footer.php";
 ?>