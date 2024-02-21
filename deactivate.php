<?php
session_start();
include_once "connect.php";

if (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];
    $emp_id = (int)$emp_id;
    $status = "false"; 
    $update = "UPDATE employee_records SET emp_status = '$status' WHERE emp_id = '$emp_id'";
    $sql2 = pg_query($conn, $update);

    if (!$sql2) {
        echo "<script>alert('Deactivation is not successful: " . pg_last_error($conn) . "');</script>";
    } else {
        echo "<script>
           alert('Deactivated Successfully');

           setTimeout(function(){
             window.location.href='employee_reg.php';
           }, 1000);
        </script>";
     
        
    }
} else {
    echo "Error Deactivating";
}


?>
