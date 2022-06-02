<?php
header('Content-type: application/json');
require '../libs/connectdb.php';

$surname = strtoupper(htmlspecialchars($_POST['surname']));
$first_name = strtoupper(htmlspecialchars($_POST['first_name']));
$last_name = strtoupper(htmlspecialchars($_POST['last_name']));
$email = strtoupper(htmlspecialchars($_POST['email']));
$polling_station = strtoupper(htmlspecialchars($_POST['polling_station']));

$proceed = true;

$result_email = mysqli_query($connectdb,"SELECT * FROM voters WHERE email='$email' ");

if(mysqli_num_rows($result_email) > 0){
    $proceed = false;
    $data = [
      'error' => 'This Email is already registered'
    ];    
    $response = json_encode($data);
    echo($response);
}

$query = "UPDATE voters SET ";

$queryok=0;

if(strlen($surname)>0){
    $queryok=1;
    $query .= "surname='{$surname}'";
}

if(strlen($first_name)>0){
    if($queryok == 1){$query .=",";}
    $queryok=1;
    $query .="first_name='{$first_name}'";
}

if(strlen($last_name)>0){
    if($queryok == 1){$query .=",";}
    $queryok=1;
    $query .= "last_name='{$last_name}'";
}

if(strlen($email)>0){
    if($queryok == 1){$query .=",";}
    $queryok=1;
    $query .= "email='{$email}'";
}

if(strlen($polling_station)>0){
    if($queryok == 1){$query .=",";}
    $queryok=1;
    $query .= "polling_station='{$polling_station}'";
}

if($queryok === 1){
    if(mysqli_query($connectdb,$query)){
        $data = [
            'success' => 'Details updated succesfully'
        ];
        $response = json_encode($data);
        echo($response);
    }

    else if(!mysqli_query($connectdb,$query)){
        $data = [
            'error' => 'An error occured'
        ];
        $response = json_encode($data);
        echo($response);

    }
}

?>