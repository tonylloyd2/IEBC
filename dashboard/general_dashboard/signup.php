<?php
session_start();


require "databases/connectdb.php";
require  "functions.php";
    

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTER REGISTRATION</title>
     <!-- <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css"> -->
     <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
     <link rel="stylesheet" href="css/passwordstyles.css">
      


     <!-- <link rel="stylesheet" href="user.css"> -->
</head>   
<body>    
<div class="main-wrapper">
    <div class="container border p-4 mycontent" 
         style="border-radius:40px; background-color:#5e636e;">
    <img height="100px" width="100px" class="d-block mx-auto rounded-circle" src="coatofarms.png" alt="">

            <form autocomplete="off" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class='myform' id="form"  method="post">
            <div class="mx-auto col-lg-6 text-center"><h3 style="color:#fff">VOTER REGISTRATION</h3></div>
        <div class="row mx-auto">
            <div class="col-lg-6">
                <div class="mt-3" >
                   <b> <label for="surname" style="color:#fff" class="form-label">Surname:</label><br/></b>
                 <b>   <input type="text"   placeholder="surname" name="surname" id="surname" class="form-control shadow-none text-uppercase" required 
                     style="border-radius:40px; background-color:lightblue;
                            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);"/></b>
                </div>

                <div class="mt-3">
                   <b><label for="first_name" class="form-label" style="color:#fff" >First Name:</label><br/></b>
                    <input type="text" name="first_name" placeholder="First Name" id="first_name" class="form-control shadow-none text-uppercase" required 
                    style="border-radius:40px; background-color:lightblue;
                            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);"/>
                </div>

                <div class="mt-3">
                    <b><label for="last_name" style="color:#fff"class="form-label">Last Name:</label><br/></b>
                    <input type="text" name="last_name" placeholder="Last Name" id="last_name" class="form-control shadow-none text-uppercase" required
                    style="border-radius:40px; background-color:lightblue;
                            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);"/>
                </div>

                <div class="mt-3">
                   <b> <label for="national_id" style="color:#fff" class="form-label">Id Number:</label><br/></b>
                    <input type="text" name="national_id" placeholder="Id Number" id="national_id" class="form-control shadow-none" required
                    style="border-radius:40px; background-color:lightblue;
                            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);"/>
                </div>

                <div class="mt-3">
                    <b><label style="color:#fff" class="form-label">Upload Profile Picture</label><br/></b>
                    <input type="file" name="image" id="image" placeholder="Profile Picture" accept="image/*" class="btn shadow-none btn-outline-primary" style="width:100%" required
                    style="border-radius:40px; background-color:lightblue;
                            box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" alt="seher"/>
                </div>
                
                <div class="mt-3">
                    <b><label for="gender" required style="color:#fff" class="form-label">Gender:</label><br></b>
                    <select name="gender" id="gender" placeholder="Gender"  class="shadow-none form-control form-select"
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                <option value="Female" style="background-color:#fff">Female</option>
                <option value="Male"style="background-color:#fff">Male</option>
                <option value="Male"style="background-color:#fff">Other</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="mt-3">
                    <b><label for="date_of_birth" style="color:#fff" required class="form-label">Date of Birth:</label><br/></b>
                    <input type="date" name="date_of_birth" id="date_of_birth" placeholder="yyyy-mm-dd" min="1900-01-01" max="2004-04-08" class="shadow-none form-control shadow-none" required
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                </div>
                <div class="mt-3">
                    <b> <label for="email" style="color:#fff" required class="form-label">Email:</label><br/></b>
                    <input type="email" name="email" id="email"  placeholder="Email " class="form-control shadow-none" required 
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);"> 
                </div>
                
                <div class="mt-3">
                    <b><label for="county" class="form-label" style="color:#fff" required url="http://localhost/html/php_repo/IEBC/action/getSubCounty.php">County</label></b>
                <select name="county" id='county' required class="form-select text-uppercase shadow-none" style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);" >
                    <?php
                        while($county = mysqli_fetch_assoc($query_county)){    
                    ?>
                        <option style="background-color:#fff" value="<?php echo($county['countyName']);?>"><?php echo($county['countyName']);?></option>
                    <?php       
                    }   
                    ?>
                </select>
                </div>

                <div class="mt-3">
                    <b><label for="constituency" style="color:#fff" class="form-label">Constituency:</label><br></b>
                    <select name="constituency" required id="constituency" class="shadow-none text-uppercase form-select"
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                        <?php 
                        while($constituency = mysqli_fetch_assoc($query_constituency)){
                        ?>
                        <option style="background-color:#fff" value="<?php echo($constituency['subCounty']);?>"><?php echo($constituency['subCounty']);?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mt-3">
                    <b><label for="ward" style="color:#fff" required class="form-label">Ward:</label><br></b>
                    <input type="text" name="ward" id="ward" required placeholder="Ward" class="text-uppercase shadow-none form-control"
                     style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                </div>

                <div class="mt-3">
                   <b> <label for="polling_station" style="color:#fff" class="form-label">Polling Station</label><br></b>
                   <input type="text" name="polling_station" required placeholder="Polling Station" id="polling_station" class="text-uppercase shadow-none form-control"
                    style="border-radius:40px; background-color:lightblue; box-shadow: 0 1px 3px 2px rgba(0, 0, 0, 0.2);">
                </div>

            </div>
        </div>
         <div class="mt-3 col-lg-6 mx-auto">
         <button type="submit" style="width:100%;" class="btn btn-primary shadow-none" name="signup"  style="border-radius:20px">Confirm Registration</button>
         </div>
         </form>
         <div class="footer"  >
               <span class="foot" >
                    <em><b> already have an account ?</b></em>
                    <a href="login.php">
                    <button class="btn btn-rotate" id="btn-signup" style="background-color:green; border-radius:15px" > <p style="color:#ffff">Sign in</p></button>
                    </a>
               </span>
                 
         </div>
         
    </div>
    </div>
      <script src="javascript/jquery-3.6.0.min.js"></script>
      <script src="dashboard/assets/js/core/bootstrap.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       
</body>
</html>

<script>
    $(document).ready(function(){
        
        $("#county").change(function(event){
            var county = $("#county").val();
            var url = "http://localhost/html/php_repo/IEBC/action/getSubCounty.php"; 

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