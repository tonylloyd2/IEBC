<?php
session_start();

include "../../databases/connectdb.php";
include  "../../functions.php";

if (isset($_SESSION['user_id']) ){

$id = $_SESSION['user_id'];
$query_admins = mysqli_query($connectdb,"SELECT * FROM admins  where user_id='$id' limit 1");
$data = mysqli_fetch_assoc($query_admins);
$user_image = "../../media/adminprofiles/".$data['userprofile'];
}
else{
  echo("<script> alert('you are not logged in ');
  location.replace('http://localhost/html/php_repo/IEBC/dashboard/docs/documentation.php');
  </script>
  ");
}



?>

<?php include "./header_nav.php"; ?>
      <div class="panel-header panel-header-lg">
            <div>
            <b><u><p style="color:white; padding-left:10px">Voters Registration Analysis For The Year 2021/2022 :</p></u></b>
            </div>
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Personal Details</h5>
                <h4 class="card-title">Profile Details</h4>
                <div class="dropdown" style="padding-left:95% ;padding-bottom: 10px;">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"  ></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" >
                    <a class="dropdown-item text-danger" href="./user.php">View full profile</a>
                    <a class="dropdown-item text-danger" href="#">Edit profile </a>

                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Image
                      </th>  
                      <th>  
                        Name
                      </th>
                      <th>
                        ID
                      </th>
                      <th>
                        Email
                      </th>
                      <th >
                        Phone
                      </th>
                      <th>
                        Gender
                      </th>
                      <th>
                        City
                      </th>
                      <th>
                      PO.BOX
                      </th>
                      <th>
                      Salary
                      </th>
                    </thead>
                    <tbody>
                    <?php
                        while($data){    
                    ?>
                      <tr>
                        <td><img class="avatar border-gray" src="<?php echo($user_image); ?>" alt="..."></td>
                        <td><?php  echo($data['first_name'] . " ".$data['surname']); ?></td>
                        <td><?php  echo($data['national_id']); ?></td>
                        <td><?php  echo($data['email']); ?></td>
                        <td><?php  echo($data['phone']); ?></td>
                        <td><?php  echo($data['gender']); ?></td>
                        <td><?php  echo($data['city']); ?></td>
                        <td><?php  echo($data['postal_code']); ?></td>
                        <td><?php  echo($data['salary']); ?></td>
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
<?php include './footer.php'; ?>