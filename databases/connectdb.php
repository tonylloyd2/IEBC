

      
      
<?php
$host = "localhost";
$username = "root";
$password = "0220";
$db_name = "iebc";

$connectdb = mysqli_connect($host,$username,$password,$db_name);

if (!$connectdb)
{
   echo "Connection failed<br>";
   echo "Error number: " . mysqli_connect_errno() . "<br>";
   echo "Error message: " . mysqli_connect_error() . "<br>";
   die();
}
?>  
