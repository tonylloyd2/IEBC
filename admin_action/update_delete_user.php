<?php

session_start();

include "../databases/connectdb.php";
include  "../functions.php";

if (isset($_SESSION['user_id']) ){
    ?>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/passwordstyles.css">
    <link href="../dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../dashboard/assets/css/now-ui-dashboard.css" rel="stylesheet" />
    <title>
    <?php 
    $query_admins = mysqli_query($connectdb,"SELECT * FROM admins");
    $admin = mysqli_fetch_assoc($query_admins);
    echo "@admin: ";echo  $admin['user_id'];?>
    </title>
    <?php
    $query_admins = mysqli_query($connectdb,"SELECT * FROM voters where national_id='{$_POST['national_id']}'");
    $db_admin = mysqli_fetch_assoc($query_admins);
    // $user_image = "../../".$db_admin['image'];
    $query_county = mysqli_query($connectdb,"SELECT * FROM county ORDER BY countyName");
    $query_constituency = mysqli_query($connectdb,"SELECT * FROM sub_county WHERE countyName='BARINGO'");

    if(isset($_POST['delete']) ){

        $query_delete="DELETE from voters  where national_id='{$_POST['national_id']}'";
        $id = $_POST['national_id']; 
        if (mysqli_query($connectdb,$query_delete)) {
            $data = [
              'success' => 'Password created succesfully'
             ]; 
        echo "<script>
                    alert('The deletion of voter@$id was successfull');
                    location.replace('http://localhost/html/php_repo/IEBC/dashboard/admin_dashboard/tables.php');
              </script>"; 
        }
    }
    if(isset($_POST['update']) ){
        ?>
    <div class="header" style="padding-left:35%; color:green;">
    <h2 class="col md-6">
       <u> Edit voter Details</u>
    </h2>
    </div>
    <div class="card-body" style="background-color:#fff">
        <form action="update_to_db.php" method="post" >
            <div class="row">
                <div class="col-md-3 pr-1">
                    <div class="form-group">
                        <label>Country (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Kenya" style="color:black">
                    </div>
                </div>
                <div class="col-md-3 px-1">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" style="color:green;"name="id" value="<?php echo $db_admin['id'];?>" >
                    </div>
                </div>
                <div class="col-md-4 pl-1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $db_admin['email'];?>" style="color:green">
                    </div>
                </div>
                <div class="col-md-2 px-1">
                    <div class="form-group">
                    <label>Gender</label>
                    <input type="text" style="color:green" name="gender" class="form-control" value="<?php echo $db_admin['gender'];?>" value="" >
                    </div>
                </div>
                  <!-- </div>
                  <div class="row"> -->
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" style="color:green"name="first_name" class="form-control" value="<?php echo $db_admin['first_name'];?>   ">
                    </div>
                </div>
                    <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" style="color:green" value="<?php echo  $db_admin['last_name'];?> " value="">
                    </div>
                </div>
                <div class="col-md-4 pr-1">
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" style="color:green"name="surname" value="<?php echo  $db_admin['surname'];?> " value="">
                    </div>
                </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>National id</label>
                        <input type="text" class="form-control" style="color:green" name="national_id" value="<?php echo  $db_admin['national_id'];?>  " value="">
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                        <div class="form-group">
                            <label>County : <?php echo  $db_admin['county'];?> </label>
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
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>Constituency :<?php echo  $db_admin['constituency'];?></label>
                            <select name="constituency" required id="constituency" class="shadow-none text-uppercase form-select" style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                        <?php 
                        while($constituency = mysqli_fetch_assoc($query_constituency)){
                        ?>
                        <option style="background-color:#fff ; color:green"name="constituency"  value="<?php echo($constituency['subCounty']);?>"><?php echo($constituency['subCounty']);?></option>
                        <?php } ?>
                    </select>  </div>
                    </div>
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label>Ward </label>
                            <input type="text" class="form-control" name="ward" value="<?php echo $db_admin['ward'];?>"style=" color:green">
                        </div>
                    </div>
                    <div class="col-md-4 px-1">
                        <div class="form-group">
                            <label>Polling station </label>
                            <input type="text"  class="form-control" name="polling_station" value="<?php echo $db_admin['polling_station'];?> "style=" color:green" >
                        </div>
                    </div>
                    <div class="col-md-2 pl-1">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="number" class="form-control"  value="ZIP Code" style=" color:green">
                        </div>
                    </div>
           </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Voters About</label>
                            <textarea rows="4" cols="80" class="form-control" placeholder="Edit voters about " value=""></textarea>
                        </div>
                    </div>
                </div>
                  <div class="button" style="padding-left:75%;">
                      <button type="submit" name="submit" style="background-color:green;color:#fff;border-radius:30px;width:55%;height: 40px;"> Submit Voter Changes</button>
                  </div>
       </form>
   </div>  
    <!-- footer js added   -->
    <!--   Core JS Files   -->
    <script src="../dashboard/assets/js/core/jquery.min.js"></script>
    <script src="../dashboard/assets/js/core/popper.min.js"></script>
    <script src="../dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="../dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../dashboard/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../dashboard/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../dashboard/assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../dashboard/assets/demo/demo.js"></script>
    <script src="../javascript/jquery-3.6.0.min.js"></script>
    <script src="dashboard/assets/js/core/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script> $(document).ready(function() {demo.initDashboardPageCharts();});</script>
    <script> $(document).ready(function(){$("#county").change(function(event){var county = $("#county").val();var url = "http://localhost/html/php_repo/IEBC/action/getSubCounty.php"; $.ajax({ type : "POST",url : url, data : {county:county},}).done(function(data){$("#constituency").html(data);})});});</script>
<?php
    }



}
else {
    echo "user_id not set";
    $data = ["error" => "SEND A POST REQUEST"];
    $response = json_encode($data);
}

?>  
