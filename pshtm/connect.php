<?php

$host = "localhost";
$dbname = "train_mod_fin";
$user = "postgres";
$password = "Arindam@2842003";


$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Connection error: " . pg_last_error();
} else {
   
    
}



?>


<!--this is mysql connection for -->
<?php
//$conn = mysqli_connect("localhost", "root", "", "pshtm");
//if (!$conn) {
//    echo "connection error" . mysqli_connect_error();
//}
?>