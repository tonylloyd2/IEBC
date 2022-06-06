<?php

// session_start();

include "../connectdb.php";
include  "../../functions.php";
include 'setup_admin.php';

if(isset($_POST['submit'])  ){
setup_admin();

}

// if (isset($_SESSION['user_id']) ){
    ?>
    <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/passwordstyles.css">
    <link href="../../dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../dashboard/assets/css/now-ui-dashboard.css" rel="stylesheet" />
    <style>
        label,textarea{
         color: white;

        }
    </style>
    <title>
    Admin Registration
    </title>
    <?php
    $query_county = mysqli_query($connectdb,"SELECT * FROM county ORDER BY countyName");
    $query_constituency = mysqli_query($connectdb,"SELECT * FROM sub_county WHERE countyName='BARINGO'");

        ?>
    
    <div class="card-body" style="background-color:#33475b; padding-top:5px">
    <div class="header" style="padding-left:35%; color:fuchsia;">
    <h2 class="col md-6">
       <u> Admin Registration</u>
    </h2>
    </div>
        <form action="" method="post" enctype="multipart/form-data" >
            <div class="row">
                
                <div class="col-md-2 pr-1">
                    <div class="form-group">
                        <label >Country (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="" value="Kenya" style="color:#33475b">
                    </div>
                </div>
                <div class="col-md-2 pr-1">
                    <div class="form-group">
                        <label>Company </label>
                        <input type="text" class="form-control" name="company" placeholder="Company" value="iebc" style="color:green">
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="form-group">
                        <label>Username (disabled)</label>
                        <input type="text" class="form-control" style="color:#33475b;"name="username" placeholder="@superAdmin001" >
                    </div>
                </div>
                <div class="col-md-2 pl-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" required placeholder="my_mail_id@company_name.co.ke" style="color:green">
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <b><label for="gender" required style="color:#fff" class="form-label">Gender:</label><br></b>
                    <select name="gender" id="gender" placeholder="Gender" required class="shadow-none form-control form-select"
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                    <option value="Male"style="background-color:#fff">Prefer not to say</option>
                    <option value="Female" style="background-color:#fff">Female</option>
                    <option value="Male"style="background-color:#fff">Male</option>
                    </select>
                    
                </div>
                <div class="col-md-2 pl-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date of birth</label>
                        <input type="date" required placeholder="yyyy-mm-dd" min="1900-01-01" max="2004-04-08" name="date_of_birth" class="form-control" style="color:green">
                    </div>
                </div>
                  <!-- </div>
                  <div class="row"> -->
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" required style="color:green"name="first_name" class="form-control" placeholder="first name">
                    </div>
                </div>
                    <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" required class="form-control" name="last_name" style="color:green" placeholder="Last name">
                    </div>
                </div>
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text"required class="form-control" style="color:green"name="surname"  placeholder="surname">
                    </div>
                </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>National id</label>
                        <input type="text" required class="form-control" style="color:green" name="national_id" placeholder="national id">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                        <div class="form-group">
                            <b><label for="county" class="form-label" style="color:#fff" required url="http://localhost/html/php_repo/IEBC/action/getSubCounty.php">County</label></b>
                            <select name="county" id='county' required class="form-select text-uppercase shadow-none" style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" >
                            <?php
                                while($county = mysqli_fetch_assoc($query_county)){    
                            ?>
                                <option style="background-color:#fff ;color:green"name="county" value="<?php echo($county['countyName']);?>"><?php echo($county['countyName']);?></option>
                            <?php       
                            }   
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>Constituency :</label>
                            <select name="constituency" required id="constituency" class="shadow-none text-uppercase form-select" style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                        <?php 
                        while($constituency = mysqli_fetch_assoc($query_constituency)){
                        ?>
                        <option style="background-color:#fff ; color:green"name="constituency"  value="<?php echo($constituency['subCounty']);?>"><?php echo($constituency['subCounty']);?></option>
                        <?php } ?>
                    </select>  </div>
                    </div>
                    <div class="col-md-2 pl-1">
                    <b><label style="color:#fff" class="form-label">Profile Picture</label><br/></b>
                    <input type="file" placeholder="Profile Picture" name="image" id="image" accept="image/*" class="btn shadow-none btn-outline-primary" style="width:100%" required style="border-radius:40px; background-color:lightblue;box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" alt="seher"/>
                    </div>
                    <div class="col-md-2 px-1">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required name="phone" value=""style=" color:green" placeholder="phone number">
                        </div>
                    </div>
                    <div class="col-md-2 px-1">
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" class="form-control" required name="address" value=""style=" color:green" placeholder="address">
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="number" class="form-control" required name="postal_code" value="ZIP Code" style=" color:green"placeholder="postal code">
                        </div>
                    </div>
           </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>My About</label>
                            <textarea rows="4" cols="80" class="form-control" required name="about" placeholder="Set my status about" value=""></textarea>
                        </div>
                    </div>
                </div>
                  <div class="button" style="padding-left:75%;">
                      <button type="submit" name="submit" style="background-color:aqua;color:black;border-radius:30px;width:55%;height: 40px;"><b> Confirm </b></button>
                  </div>
       </form>
   
    <!-- footer js added   -->
    <!--   Core JS Files   -->
    <script src="../../dashboard/assets/js/core/jquery.min.js"></script>
    <script src="../../dashboard/assets/js/core/popper.min.js"></script>
    <script src="../../dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="../../dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../../dashboard/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../dashboard/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../dashboard/assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../dashboard/assets/demo/demo.js"></script>
    <script src="../../javascript/jquery-3.6.0.min.js"></script>
    <script src="../../dashboard/assets/js/core/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script> $(document).ready(function() {demo.initDashboardPageCharts();});</script>
    <script> $(document).ready(function(){$("#county").change(function(event){var county = $("#county").val();var url = "http://localhost/html/php_repo/IEBC/action/getSubCounty.php"; $.ajax({ type : "POST",url : url, data : {county:county},}).done(function(data){$("#constituency").html(data);})});});</script>
    </div>  
<?php

?>  
