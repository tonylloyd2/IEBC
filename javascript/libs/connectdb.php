<?php

$host = 'localhost';
$username = "wandabi";
$password = "gydion1880";
$db_name = "voters";

$connectdb = mysqli_connect($host,$username,$password,$db_name);

if($connectdb === false){
    echo("Failed to connect to database");
}
?>
