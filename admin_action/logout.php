<?php 

session_start();



    if (isset($_SESSION['user_id']) ){

        unset($_SESSION['user_id']);

        echo " <script> alert ('You have been logged out succesfully');";

    }

    header("location:http://localhost/html/php_repo/IEBC/dashboard/docs/documentation.php");
die;

?>