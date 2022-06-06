<?php
session_start();
include "../../databases/connectdb.php";
include  "../../functions.php";

if(isset($_POST['login'])){

  user_login($connectdb);
  
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/iebc.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />
   <style>
     footer{
        
     }
   </style>
</head>

<?php include "./header_nav.php"; ?>
  <div class="panel-header panel-header-lg">
            <div>
            <b><u><p style="color:white; padding-left:10px;margin-bottom: 0%;">Sign in page</p></u></b>
            </div>
        <!-- <canvas> 
      </canvas> -->
      </div>
      <div class="content" style="padding-bottom:0px;padding-left:10%;">
        <div class="row">
        <div class="content">
      <form action="" method="post" >
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="border-radius:10px;border-style: hidden;">           
              <div class="card-header">
                <h5 class="title">login</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>National id</label>
                        <input type="text" id="id_number"class="form-control"required name="national_id" placeholder="Enter registered ID ">
                      </div>
                    </div>
                    <br>
                    <div class="col-md-6  pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password"required class="form-control" id="password" name="password" placeholder="PASSWORD">
                      </div>
                    </div>
                    
                   </div>
                   <br>
                  <div class="button" style="padding-left:70%;padding-top: 10px;">
                      <button type="submit" name="login" style="background-color:green;color:#fff;border-radius:30px;width:100%;">login</button>
                  </div>
              </div>

            </div>
          </div>
        </form>
        </div>
      </div>
      </div>    
  </div>
  <?php
      include './footer.php';?>
    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script>
    $(document).ready(function(){
        
        $("#county").change(function(event){
            var county = $("#county").val();
            var url = "../../action/getSubCounty.php"; 

            $.ajax({
                type : "POST",
                url : url,
                data : {
                    county:county
                },
            })
            .done(function(data){

                $("#constituency").html(data);
            })
        });
    });
</script>
<script src="../../javascript/showpass.js"></script>
</body>

</html>