<?php
session_start();
include "../../databases/connectdb.php";
include  "../../functions.php";
if (isset($_SESSION['user_id']) ){
  $id = $_SESSION['user_id'];
  $query_admins = mysqli_query($connectdb,"SELECT * FROM admins where user_id='{$id}' limit 1 ");
  $data = mysqli_fetch_assoc($query_admins);
  $user_image = "../../media/adminprofiles/".$data['userprofile'];
}
  else{
    echo("<script> alert('you are not logged in ');
    location.replace('../dashboard/docs/documentation.php');
    </script>
    ");
  }
?>
<?php include "./header_nav.php"; ?>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Profile</h5>
                <div class="dropdown" style="padding-left:95%; align-item:center">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"  ></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item text-danger" href="#">Edit profile </a>
                    </div>
                </div>

              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Independent Electral of Boundaries and Commisions">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" disabled="" placeholder="Username" value="admin001">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" disabled="" placeholder="admin001@dev.iebc.ac.ke">

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" disabled="" value="Lloyd">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Tony" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="Kisumu cosim 24d" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" disabled="" value="Kisumu City">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Country" value="Kenya">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" disabled="" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Super admin @admin001" disabled=""></textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?php echo($user_image); ?>" alt="No imae found">
                    <h5 class="title"><?php echo  $data['first_name'];?></h5>
                  </a>
                  <p class="description">
                  <?php    echo "@admin00";echo $data['id'];?> 
                  </p> 
                </div>
                <p class="description text-center">
                  "
                  *chill i'll work it all out*
                  "
                </p> 
              </div>
               <hr>
              <div class="button-container"> 
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f" style="color:royalblue;"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter" style="color:#00acee;"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g" style="color:#ff2800;"></i>
                </button>
              </div>
             </hr>
            </div>
          </div>
        </div>
      </div>
    <?php include './footer.php'; ?>
    