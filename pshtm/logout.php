<?php

    session_start();
    if(isset($_SESSION['admin_id'])){
        include_once "connect.php";

        $logout_id = $_SESSION['admin_id'];
        if(isset($logout_id)){
            $status = "false";
            $sql = pg_query($conn, "UPDATE login_credentials_admin SET status = '{$status}' WHERE admin_id = '{$logout_id}'");

            if($sql){
                session_unset();
                session_destroy();
                header("location: admin_login.php");
            }
        }
        else{

            header("location: dashboard.php");
        }
    }
    else{
        header("location: admin_login.php");
    }

?>