<?php
function create_database_and_admin(){
if (file_exists('databases/connectdb.php')) {
  include ("databases/connectdb.php");
  echo "
  <script>
  location.replace('./dashboard/docs/documentation.php');
  </script>
  ";
}
else {
  // create_database_and_admin();
  $myfile = fopen("databases/connectdb.php", "a") or die("Unable to open file!");

  $write_data = "";
      $write_data .= "\n
      
      ";
      fwrite($myfile, $write_data);

        
  echo "<script>
         alert('lets walk you through the installation process : ') ; 
         location.replace('./databases/setup_db_admin');
       </script>"; 
}

}

include ("databases/connectdb.php");    

function user_register($connectdb){

$first_name = strtoupper(htmlspecialchars($_POST['first_name']));
$last_name = strtoupper(htmlspecialchars($_POST['last_name']));
$surname = strtoupper(htmlspecialchars($_POST['surname']));
$email = strtoupper(htmlspecialchars($_POST['email']));
$national_id = htmlspecialchars($_POST['national_id']);
$gender = strtoupper(htmlspecialchars($_POST['gender'])); 
$date_of_birth = htmlspecialchars($_POST['date_of_birth']);
$county = strtoupper(htmlspecialchars($_POST['county']));
$constituency = strtoupper(htmlspecialchars($_POST['constituency']));
$ward = strtoupper(htmlspecialchars($_POST['ward']));
$polling_station = strtoupper(htmlspecialchars($_POST['polling_station']));
$phone = strtoupper(htmlspecialchars($_POST['phone']));
$about = strtoupper(htmlspecialchars($_POST['about']));
$postal = strtoupper(htmlspecialchars($_POST['postal']));
$image = $_FILES['image'];
// echo $image;
function random_id($length){   
  $alpha = array_merge(range('A','Z'));
  $rand_string = "";
  for ($i=0; $i <= $length ; $i++) { 
      $random = rand(1,2);
      if($random==1){
          $rand_string.=rand(0,9);
      }
      elseif($random==2){
          $rand_string.=$alpha[array_rand($alpha,1)];
      }
  }
  return $rand_string;
}

$user_id = random_id(15);

$proceed = true;

$result_id=mysqli_query($connectdb,"SELECT * FROM voters WHERE national_id='$national_id' ");
if(mysqli_num_rows($result_id) > 0){
    $proceed = false;
    $data = [
      'error' => 'This National ID is already registered'
    ];
    $response = json_encode($data);
    echo($response);
}

$result_email = mysqli_query($connectdb,"SELECT * FROM voters WHERE email='$email' ");

if(mysqli_num_rows($result_email) > 0){
    $proceed = false;
    $data = [
      'error' => 'This Email is already registered'
    ];    
    $response = json_encode($data);
    echo($response);
}

if($proceed){
  $media_root = "../../media/profiles/";
  $upload_to = $media_root . basename($_FILES["image"]["name"]);
  $image_url = "../../media/profiles/".basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($upload_to,PATHINFO_EXTENSION));
  
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } 
    else {
      $data =["error" => "File is not an image."];
      $response = json_encode($data);
      echo($response);
      $uploadOk = 0;
    }
  
    if ($_FILES["image"]["size"] > 500000) {
    $data = ["error" => "Sorry, your file is too large."];
    $response = json_encode($data);
    echo($response);
    $uploadOk = 0;
   }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    $data = ["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
    $response = json_encode($data);
    echo($response);
    $uploadOk = 0;
   }
  
  if ($uploadOk == 0) {
    $data = ["error" => "Sorry, your file was not uploaded."];
    $response = json_encode($data);
    echo($response);
   } 
  
   else {
     if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_to)) {
      
        $query = "INSERT INTO voters(national_id,surname,first_name,last_name,email,gender,date_of_birth,county,constituency,
        ward,polling_station,image,user_id,postal,about,phone) 
        VALUES('{$national_id}','{$surname}','{$first_name}','{$last_name}',
              '{$email}','{$gender}','{$date_of_birth}','{$county}',  '{$constituency}',
              '{$ward}','{$polling_station}','{$image_url}','{$user_id}','{$postal}','{$about}','{$phone}')";

      if(mysqli_query($connectdb,$query)){
            $data = [
                'success' => 'Voter registered succesfully'
              ]; 
              $response = json_encode($data);
              echo "<script>
                    alert('registration was successfull');
                    alert('We recommend that you create your password');
                    location.replace('./password.php');
                    </script>";
              
      }
      else if(!mysqli_query($connectdb,$query)){
        $data = [
            'error' => 'There was an error in your registration please try again'
        ];
        $response = json_encode($data);
        echo($response);
      }                                     
    } 
    else {
      $data = ["error" => "Sorry, there was an error uploading your file."];
      $response = json_encode($data);
      echo($response);
    }
  }
}
}
function user_password_update($connectdb){
  // $first_password = strtoupper(htmlspecialchars($_POST['fpassword']));
  $second_password = $_POST['spassword'];
  $national_id = htmlspecialchars($_POST['national_id']);
  
  $result_id=mysqli_query($connectdb,"SELECT * FROM voters WHERE national_id='{$national_id}' limit 1");


  if(mysqli_num_rows($result_id) == 1){
    $myfile = fopen("../../databases/voters/test.txt", "a") or die("Unable to open file!");
    $user_data = mysqli_fetch_assoc($result_id);

    if($user_data['national_id'] === $national_id){

      $update_password_query ="update voters set password='{$second_password}' where national_id = '{$national_id}' " ;  

       if (mysqli_query($connectdb,$update_password_query)) {
        $data = [
          'success' => 'Password created succesfully'
        ]; 
        $response = json_encode($data);
        echo($response);
        $write_data = "";
        $append = true;
        while ($append) {
        $write_data .= $user_data['id']." :     ";
        $write_data .= $user_data['surname']."      ";
        $write_data .= $user_data['last_name']."      ";
        $write_data .= $user_data['first_name']."     ";
        $write_data .= $user_data['national_id']."      ";
        $write_data .= $user_data['image']."      ";
        $write_data .= $user_data['email']."      ";
        $write_data .= $user_data['gender']."     ";
        $write_data .= $user_data['date_of_birth']."      ";
        $write_data .= $user_data['registration_date']."      ";
        $write_data .= $user_data['county']."     ";
        $write_data .= $user_data['constituency']."     ";
        $write_data .= $user_data['ward']."     ";
        $write_data .= $user_data['polling_station']."      ";
        $write_data .= $user_data['password']."\n";
        $append = false;
        }
        fwrite($myfile, $write_data);
        fclose($myfile);
      

        header("location:user_login.php");
       }
    }
    else {
      echo(" <script> 
           alert('You have entered the wrong identification number ');
           </script>
    ");
    }
  }
  else {
    echo(" 
    <script> 
           alert('Check the  identification number  and try again');
    </script>
    ");
  }
}
function check_user_login($connectdb){
                                                   
  if (isset($_SESSION['user_id'])){
      $id = $_SESSION['user_id'];
      $query = " select * from voters where user_id = '$id'  limit 1";
      $result = mysqli_query($connectdb,$query);
      if($result && mysqli_num_rows($result) > 0 ){
          $user_data = mysqli_fetch_assoc($result);
          $_SESSION['user_id'] = $user_data['user_id'];  
      
          return $user_data;
          
      }
  }
  // redirect to homepage
  echo "
  <script>
  location.replace('./dashboard/docs/documentation.php');
  </script>
  ";
    die;
}

function user_login($connectdb){
  $national_id = $_POST['national_id'];
  $password = $_POST['password'];
  if(!empty($national_id) && !empty($password) ){
    $query  = "select * from  voters where national_id = '$national_id' limit 1";
    $result =  mysqli_query($connectdb,$query);
    // if ($result) {
        if($result && mysqli_num_rows($result) > 0 ){
            $user_data = mysqli_fetch_assoc($result);
            // password corfirmation
            if( $user_data['password'] === $password){
                $_SESSION['user_id'] = $user_data['user_id'];  
                // echo("ellosrer");
                header("location:../../dashboard/user_dashboard/user_dashboard.php");
                die; 
            } 
            else {
              echo "<script> alert('wrong password');</script>";
            }    
        }   
             
    // }
    else {
      echo "<script> alert('Recheck your identification number and try again'); </script>";
    }
  }
  else {
    echo "<script> alert('fields cannot be empty');</script>";
  }
}

function change_user_image($connectdb){
  

}
function change_user_profile($connectdb){

}
function change_user_password($connectdb){

}



function check_admin_login($connectdb){
  if (isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $query = " select * from admins where user_id = '$id'  limit 1";
    $result = mysqli_query($connectdb,$query);
    if($result && mysqli_num_rows($result) > 0 ){
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user_data['user_id'];  
        return $user_data;

    }
}
// redirect to homepage
echo "
 <script>
 location.replace('./dashboard/docs/documentation.php');
 </script>
 ";
die;
}

function admin_login($connectdb){
  $national_id = $_POST['national_id'];
  $password = $_POST['password'];
  if(!empty($national_id) && !empty($password) ){
    $query  = "select * from  admins where national_id = '$national_id' limit 1";
    $result =  mysqli_query($connectdb,$query);
    // if ($result) {
        if($result && mysqli_num_rows($result) > 0 ){
            $user_data = mysqli_fetch_assoc($result);
            // password corfirmation
            if( $user_data['password'] === $password){
                $_SESSION['user_id'] = $user_data['user_id'];  
                // echo("ellosrer");
                header("location:../dashboard/admin_dashboard/dashboard.php");
                die; 
            } 
            else {
              echo "<script> alert('wrong password');</script>";
            }    
        }   
            
      else {
      echo "<script> alert('Recheck your identification number and try again'); </script>";
    }
  }
  else {
    echo "<script> alert('fields cannot be empty');</script>";
  }
}  
function admin_password_update($connectdb){
  // $first_password = strtoupper(htmlspecialchars($_POST['fpassword']));
  $second_password = $_POST['spassword'];
  $national_id = htmlspecialchars($_POST['national_id']);
  
  $result_id=mysqli_query($connectdb,"SELECT * FROM admins WHERE national_id='{$national_id}' limit 1");


  if(mysqli_num_rows($result_id) == 1){
    // $myfile = fopen("databases/admin/admin.txt", "a") or die("Unable to open file!");
    $user_data = mysqli_fetch_assoc($result_id);

    if($user_data['national_id'] === $national_id){

      $update_password_query ="update admins set password='{$second_password}' where national_id = '{$national_id}' " ;  

       if (mysqli_query($connectdb,$update_password_query)) {
        $data = [
          'success' => 'Password created succesfully'
        ]; 

        // email verification........next


        $response = json_encode($data);
        echo($response);
        // $write_data = "";
        // $append = true;
        // while ($append) {
        // $write_data .= $user_data['id']." :     ";
        // $write_data .= $user_data['surname']."      ";
        // $write_data .= $user_data['last_name']."      ";
        // $write_data .= $user_data['first_name']."     ";
        // $write_data .= $user_data['national_id']."      ";
        // // $write_data .= $user_data['image']."      ";
        // // $write_data .= $user_data['email']."      ";
        // $write_data .= $user_data['gender']."     ";
        // $write_data .= $user_data['date_of_birth']."      ";
        // // $write_data .= $user_data['registration_date']."      ";
        // $write_data .= $user_data['city']."     ";
        // $write_data .= $user_data['constituency']."     ";
        // // $write_data .= $user_data['ward']."     ";
        // // $write_data .= $user_data['polling_station']."      ";
        // $write_data .= $user_data['password']."\n";
        // $append = false;
        // }
        // fwrite($myfile, $write_data);
        // fclose($myfile);
        header("location:./login.php");
      }
    }
    else {
      echo(" <script> 
           alert('You have entered the wrong identification number ');
           </script>
    ");
    }
  }
  else {
    echo(" 
    <script> 
           alert('Check the  identification number  and try again');
    </script>
    ");
  }
}









?>