<?php
session_start();
header('Content-type: application/json');
require '../libs/connectdb.php';

$staff_id = strtoupper(htmlspecialchars($_POST['staff_id']));
$password = $_POST['password'];

$query = mysqli_query($connectdb,"SELECT * FROM staff WHERE staff_id='$staff_id'");
    if(mysqli_num_rows($query) === 1){
        while($row = mysqli_fetch_assoc($query)){
            if(password_verify($password,$row['password'])){
            $_SESSION['staff_logged_in'] = true;
            
            $user = [
                'surname' => $row['surname'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'staff_id' => $row['staff_id']
            ];
            
            $_SESSION['user'] = $user;

            $data = [
                'success' => 'Details verified'
            ];
            $response = json_encode($data);
            echo($response);
        }
        else if(!password_verify($password,$row['password'])){
            $data = [
                'error' => 'wrong password'
            ];
            $response = json_encode($data);
            echo($response);
        }
                
    }
    }
    else if(mysqli_num_rows($query) === 0){
        $data = [
            'error' => 'This user is not registered'
        ];
        $response = json_encode($data);
        echo($response);
    }
?>