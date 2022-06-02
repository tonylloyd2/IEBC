<?php
header('Content-type: application/json');
require '../libs/connectdb.php';

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

$media_root = "../media/profiles/";
$upload_to = $media_root . basename($_FILES["image"]["name"]);
$image_url = "/VoterRegistration/media/profiles/".basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($upload_to,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
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

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $data = ["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
  $response = json_encode($data);
  echo($response);
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  $data = ["error" => "Sorry, your file was not uploaded."];
  $response = json_encode($data);
  echo($response);
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_to)) {
    
    $query = "INSERT INTO voters(national_id,surname,first_name,last_name,email,gender,date_of_birth,county,constituency,ward,polling_station,image) 
    VALUES({$national_id},'{$surname}','{$first_name}','{$last_name}','{$email}','{$gender}','{$date_of_birth}','{$county}',
    '{$constituency}','{$ward}','{$polling_station}','{$image_url}')";

if(mysqli_query($connectdb,$query)){
        $data = [
            'success' => 'Voter registered succesfully'
          ]; 
          $response = json_encode($data);
          echo($response);
}

else if(!mysqli_query($connectdb,$query)){
    $data = [
        'error' => 'There was an error in your registration please try again'
    ];
    $response = json_encode($data);
    echo($response);
}

  } else {
    $data = ["error" => "Sorry, there was an error uploading your file."];
    $response = json_encode($data);
    echo($response);
  }
}

}
?>