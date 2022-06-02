<?php

function is_authenticated(){
    if(isset($_SESSION['staff_logged_in'])){
        return true;
    }

    else if(!isset($_SESSION['staff_logged_in'])){
        return false;
    }
}

?>