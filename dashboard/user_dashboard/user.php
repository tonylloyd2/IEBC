<?php
session_start();

include "../../databases/connectdb.php";
include  "../../functions.php";

if (isset($_SESSION['user_id']) ){
  $query_admins = mysqli_query($connectdb,"SELECT * FROM voters where user_id={$_SESSION['user_id']} order by national_id ");
  $db_admin = mysqli_fetch_assoc($query_admins);
  $user_image = "../../".$db_admin['image'];
  }
  else{
    echo("<script> alert('you are not logged in ');
    location.replace('http://localhost/html/php_repo/IEBC/dashboard/docs/documentation.php');
    </script>
    ");
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
  <?php  echo($db_admin['surname'] . "s Dashboard" );?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="coatofarms.png" class="simple-text logo-mini">
          IEBC : 
        </a>
        <a href="#Admin" class="simple-text logo-normal">
          LLOYD KATILA
        </a>
      </div>
     
      <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
          <li class="active ">
            <a href="./user_dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./user.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>my Profile</p>
            </a>
          </li>
          <li>
            <a href="./notifications.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li>
            <a href="./typography.php">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Cast Vote</p>
            </a>
          </li>
        </ul>     
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#@admin">My Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./notifications.php">
                  <i class="now-ui-icons ui-1_bell-53"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="now-ui-icons location_world"></i> -->
                  <p><em> Quick Actions</em>
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./map.php" style="background-color:green; color:white;" >maps</a>
                  <a class="dropdown-item" href="./user.php" style="background-color:green; color:white;" >Edit Profile</a>
                  <a class="dropdown-item" href="./notifications.php" style="background-color:green; color:white;" >Notifications</a>
                  <a class="dropdown-item" href="http://localhost/html/php_repo/IEBC/admin_action/logout.php" style="background-color:red; color:white;" >Log out</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      <form action="update_user_profile.php" method="post">
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">           
              <div class="card-header">
                <h5 class="title">View / Edit Profile</h5>
                <div class="dropdown" style="padding-left:95%; align-item:center">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"  ></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" >
                    <button class=""  style="width:100% ; color:red ; border:unset ; text-align:start" name="submit">Edit Profile</button>
                    <button class=""  style="width:100% ; color:red ;border:unset; text-align:start" name="password">Change Password</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Country (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Kenya">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?php    echo "@Voter".$db_admin['id'];?>"  disabled="">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $db_admin['email'];?>">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" name="gender" value="<?php echo $db_admin['gender'];?>" >
                      </div>
                    </div>
                  <!-- </div>
                  <div class="row"> -->
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control"name="first_name" value="<?php echo $db_admin['first_name'];?>   ">
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control"name="last_name" value="<?php echo  $db_admin['last_name'];?> " >
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control"name="surname" value="<?php echo  $db_admin['surname'];?> " >
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>National id :{"visit the nearest huduma center with your id to change"}</label>
                        <input type="text" class="form-control" value="<?php echo  $db_admin['national_id'];?>  "disabled name="national_id">
                      </div>
                    </div>
                    
                  <!-- </div>
                  
                  <div class="row"> -->
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>County :{"visit the nearest huduma center with your id to change"}</label>
                        <input type="text" class="form-control" disabled="visit the nearest huduma center" placeholder="<?php echo  $db_admin['county'];?>  " value="">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Constituency :{"visit the nearest huduma center with your id to change"}</label>
                        <input type="text" class="form-control"  disabled placeholder="<?php echo  $db_admin['constituency'];?>  " value="">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Ward :{"visit the nearest huduma center with your id to change"}</label>
                        <input type="text" class="form-control" disabled placeholder="<?php echo $db_admin['ward'];?>" value="">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Polling station :{"visit the nearest huduma center with your id to change"}</label>
                        <input type="text" disabled class="form-control" placeholder="<?php echo $db_admin['polling_station'];?>  " value="">
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
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
                  <button type="submit" name="submit" style="background-color:red;color:#fff;border-radius:30px;width:80%;height: 40px;"> Confirm My Changes</button>
                  </div>
              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
              <div class="dropdown" style="padding-left:90%; align-item:center">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"  ></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" >
                  <button class=""  style="width:100% ; color:red ;border:unset; text-align:start" name="image">Change Profile picture</button>                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?php echo($user_image); ?>" alt="...">
                    <h5 class="title"><?php echo  $db_admin['surname']." ".$db_admin['first_name'];?></h5>
                  </a>
                  <p class="description">
                  <?php    echo "@Voter"; echo  $db_admin['id'];?>   
                  </p>
                </div>
                <p class="description text-center">
                  "i am a patrioch"
                </p> 
              </div>
               <hr>
              <div class="button-container"> 
                <p>follow us on : </p>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f" style="color:royalblue;"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter" style="color:#00acee;"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g" style="color:#ff2800;"></i>
                </button>
                <p><a href="">I.E.B.C</a>  Kenya , Ensuaring Equity </p>
              </div>
             </hr>
            </div>
          </div>
        </div>
      </div>
      </form>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://github.com/katilalloyd/">
                  Profilin Team
                </a>
              </li>
              <li>
                <a href="https://github.com/katilalloyd/">
                  About Us
                </a>
              </li>
              <li>
                <a href="https://github.com/katilalloyd/">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://github.com/katilalloyd" target="_blank">lloyd Tony</a>. Coded by <a href="https://github.com/katilalloyd" target="_blank">Profilin.dev</a>.
          </div>
        </div>
      </footer>
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
</body>

</html>