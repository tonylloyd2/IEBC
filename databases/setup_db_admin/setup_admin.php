<?php
require "../../databases/connectdb.php";

// ../databases/connectdb.php
function setup_admin(){
  require "../../databases/connectdb.php";
    $company = $_POST['company'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $surname = $_POST['surname'];
    $national_id = $_POST['national_id'];
    $city = $_POST['county'];
    $constituency = $_POST['constituency'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $postal_code = $_POST['postal_code'];
    $date_of_birth = $_POST['date_of_birth'];
    $about = $_POST['about'];
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
   
    $user_id = random_id(7);
    
  //   $media_root = "../../media/adminprofiles/";
  //   $upload_to = $media_root . basename($_FILES["image"]["name"]);
  //   $image_url = "../../media/adminprofiles/".basename($_FILES["image"]["name"]);
  //   $uploadOk = 1;
  //   $imageFileType = strtolower(pathinfo($upload_to,PATHINFO_EXTENSION));
  
  //   $check = getimagesize($_FILES["image"]["tmp_name"]);
  //   if($check !== false) {
  //     $uploadOk = 1;
  //   } 
  //   else {
  //     $data =["error"=>"File is not an image."];
  //     $response = json_encode($data);
  //     echo($response);
  //     $uploadOk = 0;
  //   }
  
  //   if ($_FILES["image"]["size"] > 5000000) {
  //   $data = ["error" => "Sorry, your file is too large."];
  //   $response = json_encode($data);
  //   echo($response);
  //   $uploadOk = 0;
  //  }
  
  // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
  //   $data = ["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
  //   $response = json_encode($data);
  //   echo($response);
  //   $uploadOk = 0;
  //  }
  //  if ($uploadOk == 0) {
  //   $data = ["error" => "Sorry, your file was not uploaded."];
  //   $response = json_encode($data);
  //   echo($response);
  //  } 
  
  //  else {
    //  if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_to)) {
      
// $host = "localhost";
// $username = "root";
// $password = "";
// $db_name = "iebc";
// $connectdb = mysqli_connect($host,$username,$password,$db_name);

     

        $query ="INSERT INTO admins(user_id,national_id,email,phone,first_name,last_name,surname,gender,address,postal_code,city,constituency,about)
                 VALUES('{$user_id}','{$national_id}','{$email}','{$phone}','{$first_name}','{$last_name}','{$surname}',
                 '{$gender}','{$address}','{$postal_code}','{$city}','{$constituency}','{$about}')";
      if(mysqli_query($connectdb,$query)){
            $data = [
                'success' => 'Voter registered succesfully'
              ]; 
              $response = json_encode($data);
              echo "<script>
                    alert('registration was successfull');
                    alert('lets erify your email address ... A verification code has been sent to your email address');
                    location.replace('http://localhost/html/php_repo/IEBC/admin_action/password.php');
                    </script>";
              
      }
      else if(!mysqli_query($connectdb,$query)){
        $data = [
            'error' => 'There was an error in your registration please try again'
        ];
        $response = json_encode($data);
        echo($response);
      }                                     
    // } 
    else {
      $data = ["error" => "Sorry, there was an error uploading your file."];
      $response = json_encode($data);
      echo($response);
    }
  }

// }

 
?>