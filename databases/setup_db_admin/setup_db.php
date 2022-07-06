<?php

function setup_db(){
    $host = $_POST['host'];
    $username = $_POST['username_db'];
    $password = $_POST['password_db'];
    $db_name = $_POST['name_db'];


    $myfile = fopen("../connectdb.php", "a") or die("Unable to open file!");
    $write_data = '
<?php
$host = "'.$host.'";
$username = "'.$username.'";
$password = "'.$password.'";
$db_name = "'.$db_name.'";

$connectdb = mysqli_connect($host,$username,$password,$db_name);

if (!$connectdb)
{
   echo "Connection failed<br>";
   echo "Error number: " . mysqli_connect_errno() . "<br>";
   echo "Error message: " . mysqli_connect_error() . "<br>";
   die();
}
?>  
';
fwrite($myfile, $write_data);

    

}

?>