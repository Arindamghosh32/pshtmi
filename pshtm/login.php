<?php
session_start();
include_once "connect.php";


$username = pg_escape_string($conn, $_POST['username']);
$password = pg_escape_string($conn, $_POST['password']);

if (!empty($username) && !empty($password)) {

   
    $query = "SELECT * FROM login_credentials_admin WHERE username = $1 AND password = $2";
    $stmt = pg_prepare($conn, "select_admin", $query);

    
    $result = pg_execute($conn, "select_admin", array($username, $password));
    

    if ($result) {
        
        if (pg_num_rows($result) > 0) {
            $row = pg_fetch_assoc($result);

            $status = "true";
            
            $query2 = "UPDATE login_credentials_admin SET status = $1 WHERE admin_id = $2";
            $stmt2 = pg_prepare($conn, "update_status", $query2);
            $result2 = pg_execute($conn, "update_status", array($status, $row['admin_id']));

            if ($result2) {
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: dashboard.php");
                exit;
            } else {
                echo "Error updating status.";
            }
        } else {
            
            $query_trainer = "SELECT * FROM login_credentials_trainers WHERE username = $1 AND password = $2";
            $stmt_trainer = pg_prepare($conn, "select_trainer", $query_trainer);

           
            $result_trainer = pg_execute($conn, "select_trainer", array($username, $password));

            if ($result_trainer && pg_num_rows($result_trainer) > 0) {
                $row_trainer = pg_fetch_assoc($result_trainer);

             
                 $status = "true";
                 $query2 = "UPDATE login_credentials_trainers SET status = $1 WHERE trainer_id = $2";
                 $stmt2 = pg_prepare($conn, "update_status_trainer", $query2);
                 $result2 = pg_execute($conn, "update_status_trainer", array($status, $row_trainer['trainer_id']));

                $_SESSION['trainer_id'] = $row_trainer['trainer_id'];
                header("Location: dashboard.php"); 
                exit;
            } else {
                echo "Invalid input";
            }
        }
    } else {
        echo "Error in query execution.";
    }
} else {
    echo "All fields required";
}

  
?>
