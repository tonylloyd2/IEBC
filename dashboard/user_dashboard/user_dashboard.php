<?php
session_start();

include "../../databases/connectdb.php";
include  "../../functions.php";

if (isset($_SESSION['user_id']) ){
$id = $_SESSION['user_id'];
$query_admins = mysqli_query($connectdb,"SELECT * FROM voters  where user_id = $id  limit 1");
$data = mysqli_fetch_assoc($query_admins);
$user_image = "../../".$data['image'];

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
  <?php  echo($data['surname'] . "'s Dashboard" );?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css" rel="stylesheet" />
   
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
       
      <div class="logo">
        <a href="#IEBC" class="simple-text logo-mini">
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
            <a class="navbar-brand" href="#@Admin">Dashboard</a> <br>
            
          </div>
          <br>
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
                  <a class="dropdown-item" href="http://localhost/html/php_repo/IEBC/admin_action/logout.php" style="background-color:red; color:white;" >Log out</a>                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user.php">
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
      

      <div class="panel-header panel-header-lg">
            <div>
            <b><u><p style="color:white; padding-left:10px">WELCOME <?php  echo( " : ".$data['surname'] . "    ".$data['first_name'] ); ?> </p></u></b>
            </div>
        <!-- <canvas> -->
          <picture style="padding-left:30%;">
        <img class="avatar border-gray" style=""src="<?php echo($user_image); ?>" alt="..." width=30% height="104%">
        </picture>
        <!-- </canvas> -->
      </div>
      <div class="content" style="padding-top:35px">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Personal Details</h5>
                <label class="card-title" url="./user.php"><a href="./user.php">View Full Profile ?</a></label>
                <div class="dropdown" style="padding-left:95% ;padding-bottom: 10px;">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"  ></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item text-danger" href="./user.php">View full profile</a>
                    <a class="dropdown-item text-danger" href="./user.php">Edit profile </a>

                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Names
                      </th>
                      <th>
                        ID Number
                      </th>
                      <th>
                        Email
                      </th>
                      <th >
                        Gender
                      </th>
                      <th>
                        County
                      </th>
                      <th>
                        Ward
                      </th>
                    </thead>
                    <tbody>
                    <?php
                        while($data){    
                    ?>
                      <tr>
                        <td><?php  echo($data['surname'] . " ".$data['first_name']. "  ".$data['last_name'] ); ?></td>
                        <td><?php  echo($data['national_id']); ?></td>
                        <td><?php  echo($data['email']); ?></td>
                        <td><?php  echo($data['gender']); ?></td>
                        <td><?php  echo($data['county']); ?></td>
                        <td><?php  echo($data['ward']); ?></td>
                      </tr>
                       <?php
                       break;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>