<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/iebc.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
<?php    echo "@admin: ".$data['user_id'];?>
    </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/tablecss.css">
  <link rel="stylesheet" href="../../css/styles.css">
  
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
      border-style: hidden;
      background-color: honeydew;
      color: black;
    }
    button:hover{
      background-color:lightcoral ;
      height: 20px;
    }
    #i{
      color: black;
    }
    #i:hover{
      background-color:lightcoral ;
    }
  </style>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="now-ui-icons location_world"></i> -->
                  <i class="now-ui-icons media-2_sound-wave" style="background-color:black; color:white;"></i>
                  <p><em style="background-color:black; color:white;"> Quick Actions</em>
                  
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./tables.php" style="background-color:green; color:white;" >Voters table</a>
                  <a class="dropdown-item" href="./icons.php" style="background-color:green; color:white;" >Icons</a>
                  <a class="dropdown-item" href="./map.php" style="background-color:green; color:white;" >maps</a>
                  <a class="dropdown-item" href="./user.php" style="background-color:green; color:white;" >Edit Profile</a>
                  <a class="dropdown-item" href="./notifications.php" style="background-color:green; color:white;" >Notifications</a>
                  <a class="dropdown-item" href="http://localhost/html/php_repo/IEBC/admin_action/logout.php" style="background-color:red; color:white;" >Log out</a>                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#lloyd">
                  <i class="now-ui-icons ui-1_bell-53"style="background-color:black; color:white;"></i>
                  <p>
                    <span class="d-lg-none d-md-block"style="background-color:black; color:white;">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user.php">
                  <i class="now-ui-icons users_single-02" style="background-color:black; color:white;"></i>
                  <p style="color:green;">
                    <span class="d-lg-none d-md-block" style="background-color:black; color:white;">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      