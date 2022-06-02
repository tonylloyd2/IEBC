<?php
session_start();
include "../databases/connectdb.php";
include  "../functions.php";


if(isset($_POST['submit']) ){
    $id = strtoupper(htmlspecialchars($_POST['id']));
    $first_name = strtoupper(htmlspecialchars($_POST['first_name']));
    $last_name = strtoupper(htmlspecialchars($_POST['last_name']));
    $surname = strtoupper(htmlspecialchars($_POST['surname']));
    $email = strtoupper(htmlspecialchars($_POST['email']));
    $national_id = htmlspecialchars($_POST['national_id']);
    $gender = strtoupper(htmlspecialchars($_POST['gender'])); 
    // $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $county = strtoupper(htmlspecialchars($_POST['county']));
    $constituency = strtoupper(htmlspecialchars($_POST['constituency']));
    $ward = strtoupper(htmlspecialchars($_POST['ward']));
    $polling_station = strtoupper(htmlspecialchars($_POST['polling_station']));
    
    $proceed = True;
    $result_id=mysqli_query($connectdb,"SELECT * FROM voters WHERE national_id='$national_id' limit 1");
    $user_data = mysqli_fetch_assoc($result_id);
    if(mysqli_num_rows($result_id) > 0 && $user_data['national_id']== $national_id  ) {
        $proceed = True;  
    }
    $result_id=mysqli_query($connectdb,"SELECT * FROM voters WHERE email='$email' limit 1");
    if(mysqli_num_rows($result_id) > 0 && $user_data['email']== $email  ) {
        $proceed = True;
        
    }
    if($proceed){
        $query = "update voters set national_id ='{$national_id}',surname='{$surname}',first_name='{$first_name}',last_name='{$last_name}',
         email='{$email}',gender='{$gender}',county='{$county}',constituency='{$constituency}',ward='{$ward}',polling_station='{$polling_station}'  where id ='{$id}' ";
        if(mysqli_query($connectdb,$query)){
            // $user_data = mysqli_fetch_assoc(mysqli_query($connectdb,$query));
            $data = [
                'success' => 'Voter details updated  succesfully'
                ];
            $response = json_encode($data);
            echo "<script>
                alert('Voter$id details updated  succesfully');
                location.replace('http://localhost/html/php_repo/IEBC/dashboard/admin_dashboard/dashboard.php');
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
?>