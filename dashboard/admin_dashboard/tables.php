<?php
 session_start();

 include "../../databases/connectdb.php";
 include  "../../functions.php";

 if (isset($_SESSION['user_id']) ){

  $query_voters = mysqli_query($connectdb,"SELECT * FROM voters order by national_id");
  
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
  <?php 
  $query_admins = mysqli_query($connectdb,"SELECT * FROM admins");
  $db_admin = mysqli_fetch_assoc($query_admins);
  echo "@admin: ";echo  $db_admin['user_id'];?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/tablecss.css" />
  <style>
    table {
    margin: 0 auto;
    font-size: large;
    border: 1px solid black;
    border-radius:10px;
    }
    
    td {
    background-color: #E4F5D4;
    border: 1px solid black;
    }
    th,
    td {
    font-weight: bold;
    border: 1px solid black;
    padding: 10px;
    text-align: start;
    }
    td {
    font-weight: lighter;
    }
    button{
      border-radius:20px;
    }
  </style>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
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
            <a href="./dashboard.php">
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
            <a href="./tables.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Voters Table list</p>
            </a>
          </li>
          <li>
            <a href="./typography.php">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
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
            <a class="navbar-brand" href="#pablo">Table List</a>
            
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
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave" style="background-color:black; color:white;"></i>
                  <p>
                    <span class="d-lg-none d-md-block"style="background-color:black; color:white;">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world" style="background-color:black; color:white;"></i>  
                  <span class="d-lg-none d-md-block" style="background-color:black; color:white;">Quick Actions</span>
                 </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./tables.php" style="background-color:green; color:white;" >Voters table</a>
                  <a class="dropdown-item" href="#" style="background-color:green; color:white;" >Notifications</a>
                  <a class="dropdown-item" href="http://localhost/html/php_repo/IEBC/admin_action/logout.php" style="background-color:red; color:white;" >Log out</a>
                </div>
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
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Voters List </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="tableID" class="display" style="grid-auto-columns: auto;">
                    <thead>
                      <tr>
                        <th>Profile  </th>  
                        <th>Id No </th>
                        <th>Email </th>
                        <th>County </th>
                        <th>Constituency </th>
                        <th>Ward </th>
                        <th>Polling station </th>
                        <th>Action </th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if(mysqli_num_rows($query_voters) > 0){
                      ?>
                    <?php
                        while($data = mysqli_fetch_assoc($query_voters)){    
                    ?>
                      <tr>
                        <form action="../../admin_action/update_delete_user.php" method="post">
                        <td><img class="avatar border-gray" src="<?php echo("".$data['image']); ?>" alt="..."></td>
                        <td><?php  echo (strtolower($data['national_id'])); ?></td>
                        <td><?php  echo($data['email']); ?></td>
                        <td><?php  echo($data['county']); ?></td>
                         <td width="30px"><?php  echo($data['constituency']); ?></td>
                        <td><?php  echo($data['ward']); ?></td>
                        <td><?php  echo($data['polling_station']); ?></td>
                        <td>
                          <input type="text" name="national_id" hidden value="<?php echo($data['national_id']); ?>">
                          <button type="submit" style="background-color:green; color:#fff" name="update" >Update</button>
                          <button type="submit" style="background-color:red; color:#fff" name="delete">Delete</button>
                          </form>
                        </td>
                      </tr>
                       <?php
                        }

                      }
                      else  if(mysqli_num_rows($query_voters) <= 0){
                        ?>
                        <tr > <i>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          <td> 'empty'</td>
                          </i>

                        </tr>
                      <?php

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
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()));
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
  <script type="text/javascript" src="../../javascript/table.js"></script>
	<script type="text/javascript" src="../../javascript/tab.js"></script>
  <script>
		$(document).ready(function() {
			$('#tableID').DataTable({ });
		});
	</script>
</body>

</html>