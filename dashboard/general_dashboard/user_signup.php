<?php
session_start();


require "../../databases/connectdb.php";
require  "../../functions.php";
    

$query_county = mysqli_query($connectdb,"SELECT * FROM county ORDER BY countyName");
$query_constituency = mysqli_query($connectdb,"SELECT * FROM sub_county WHERE countyName='BARINGO'");

if(isset($_POST['signup'])){

    $data_exist = false;
    
    user_register($connectdb);
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
  sign up
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />
   
</head>

<?php include "./header_nav.php"; ?>
  <div class="panel-header panel-header-lg">
            <div>
            <b><u><p style="color:white; padding-left:10px">Sign up page</p></u></b>
            </div>
        <canvas> -->
      </canvas>
      </div>
      <div class="content" style="padding-top:35px">
        <div class="row">
        <!-- sign up form -->
        <div class="content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="border-radius:10px;border-style: hidden;">           
              <div class="card-header">
                <h5 class="title">Sign up </h5>
               
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label id="id_label">National id</label>
                        <input type="number" required class="form-control"placeholder="national id" id="national_id" name="national_id">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" required class="form-control" placeholder="Phone" name="phone">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required class="form-control" name="email" placeholder="email">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" required placeholder="Gender"  class="shadow-none form-control form-select"style="border-radius:40px; background-color:#fff; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                          <option value="Female" style="background-color:#fff">Female</option>
                          <option value="Male"style="background-color:#fff">Male</option>
                          <option value="Male"style="background-color:#fff">Other</option>
                        </select>
                      </div>
                    </div>
                  <!-- </div>
                  <div class="row"> -->
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" required name="first_name" placeholder="first name">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control "required name="last_name" placeholder="last name " >
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control"name="surname" required placeholder="surname" >
                      </div>
                    </div>
                    
                    <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label for="image">Profie picture</label><br>
                        <input type="file" name="image" id="image"required placeholder="Profile Picture" accept="image/*" 
                                class="btn shadow-none btn-outline-primary" style="width:100%" required 
                                style="border-radius:40px; background-color:lightblue;box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" alt="seher"/>
                      </div>
                    </div>
                    
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                      <label for="county" class="form-label"  required url="../../action/getSubCounty.php">County</label><br>
                      <select name="county" id='county' required class="form-select text-uppercase shadow-none" style="border-radius:40px;height:35px; background-color:#fff; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" >
                        <?php while($county = mysqli_fetch_assoc($query_county)){ ?>
                            <option style="background-color:grey" value="<?php echo($county['countyName']);?>"><?php echo($county['countyName']);?></option>
                        <?php } ?>
                     </select>
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                      <label for="constituency"  class="form-label">Constituency:</label><br>
                       <select name="constituency"  required id="constituency" class="shadow-none text-uppercase form-select"
                       style="border-radius:40px;height:35px; background-color:#fff; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                        <?php 
                        while($constituency = mysqli_fetch_assoc($query_constituency)){
                        ?>
                        <option style="background-color:#fff" value="<?php echo($constituency['subCounty']);?>"><?php echo($constituency['subCounty']);?></option>
                        <?php } ?>
                      </select>   

                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Ward </label>
                        <input type="text" required class="form-control" placeholder="ward" value="" name="ward">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                    <label for="date_of_birth" style="color:#fff">Date of Birth:</label>
                    <input type="date" required name="date_of_birth" id="date_of_birth" placeholder="yyyy-mm-dd" min="1900-01-01" max="2004-04-08" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Polling station </label>
                        <input type="text"  class="form-control" required placeholder="polling station" name="polling_station" value="">
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" name="postal" placeholder="ZIP Code">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" name="about" class="form-control" placeholder="Edit me to tell us more on yourself" value=""></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="button" style="padding-left:70%;">
                  <button type="submit" name="signup" style="background-color:red;color:#fff;border-radius:30px;width:80%;height: 40px;"> Confirm My Changes</button>
                  </div>
              </div>

            </div>
          </div>
        </form>
        </div>
      </div>
      </div>
       
      <?php
      include './footer.php';?>
    </div>
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
    var id  = document.getElementById('national_id').value;
    let label = document.getElementById("id_label").innerHTML; 
    if (id < 35000000 || id > 40000000) {
      //  label = "the national id is not valid";
        // alert("the national id is inalid");
     
     }

  </script>
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
</body>

</html>