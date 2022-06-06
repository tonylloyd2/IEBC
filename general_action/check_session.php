<?php
session_start();

include "../databases/connectdb.php";
include  "../functions.php";

$continue = true;
if (isset($_SESSION['user_id']) ){

    if ($continue && check_admin_login($connectdb)) {
        check_admin_login($connectdb); 
            
    }
    if ($continue && check_user_login($connectdb)) {
        check_user_login($connectdb) ;
    }
 

// if (true) {
//     check_admin_login($connectdb);
// }    
// if (true) {
//     check_user_login($connectdb);
// }

}
else {
    $continue = false;
    echo "
 <script>
 alert('You are not loged in :');
 location.replace('../dashboard/docs/documentation.php');
 </script>
 ";
}
 

?>