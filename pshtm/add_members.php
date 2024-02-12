
<?php
include('connect.php');
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("location: admin_login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $trainer_id = (int)$_POST['trainer_id'];
    $first_name = pg_escape_string($conn, $_POST['first_name']);
    $last_name = pg_escape_string($conn, $_POST['last_name']);
    $mobile = pg_escape_string($conn, $_POST['mobile']);
    $email = pg_escape_string($conn, $_POST['email']);
    $role_id = (int)$_POST['role_id'];
    $username = pg_escape_string($conn, $_POST['username']);
    $password = pg_escape_string($conn, $_POST['password']);

    $check_role_query = "SELECT role_name FROM role WHERE role_id = $1";
    $check_role_result = pg_query_params($conn, $check_role_query, array((int)$role_id));

    if ($check_role_result && $row = pg_fetch_assoc($check_role_result)) {
        $role_name = $row['role_name'];

        $insert_query_credentials = "";
        switch ($role_name) {
            case 'admin':
                $insert_query_admin = "INSERT INTO admin_records (admin_id,first_name, last_name, mobile, email, role_id)
                                        VALUES ($1, $2, $3, $4, $5,$6) RETURNING admin_id";
                $result_query1 = pg_query_params($conn, $insert_query_admin, array($trainer_id,$first_name, $last_name, $mobile, $email, $role_id));

                $row_admin = pg_fetch_assoc($result_query1);
                $admin_id = $row_admin['admin_id'];

                $insert_query_credentials = "INSERT INTO login_credentials_admin (admin_id, username, password)
                                        VALUES ($1, $2, $3)";
                $result_query2 = pg_query_params($conn, $insert_query_credentials, array($trainer_id, $username, $password));
                break;

            case 'trainer':
                $insert_query_trainer = "INSERT INTO trainer_records (trainer_id,first_name, last_name, mobile, email, role_id)
                                        VALUES ($1, $2, $3, $4, $5, $6) RETURNING trainer_id";
                $result_query1 = pg_query_params($conn, $insert_query_trainer, array($trainer_id,$first_name, $last_name, $mobile, $email, $role_id));

                $row_trainer = pg_fetch_assoc($result_query1);
                $trainer_id = $row_trainer['trainer_id'];

                $insert_query_credentials = "INSERT INTO login_credentials_trainers (trainer_id, username, password)
                                        VALUES ($1, $2, $3)";
                $result_query2 = pg_query_params($conn, $insert_query_credentials, array($trainer_id, $username, $password));
                break;

            default:
                echo "Invalid role selected.";
                exit;
        }

        if (!$result_query2) {
            echo "Error executing query (admin/trainer): " . pg_last_error($conn);
            echo '<script>alert("Bhai Nahi Hua (admin/trainer)!");</script>';
        }

        if (!$result_query1) {
            echo "Error executing query (credentials): " . pg_last_error($conn);
            echo '<script>alert("Bhai nahi hua (credentials)!");</script>';
        }

        if ($result_query1 && $result_query2) {
            echo '<script>alert("User registered successfully!");</script>';
        } else {
            echo "Error registering user.";
        }
    } else {
        echo "Error checking role information.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/manage_dept.css">
    <title>Add members</title>
</head>
<body>
      <?php require_once("navbar.html") ?>


      <div class="container">

        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    Add members
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">
                    <div class="fld">
                            <label for="">Member Id</label>
                            <input type="number" name="trainer_id" id="training_program_id"
                                placeholder="Enter Member id" required>
                        </div>

                        <div class="fld">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" id="training_name"
                                placeholder="Enter First Name" required>
                        </div>

                        <div class="fld">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" id="training_name"
                                placeholder="Enter Last Name" required>
                        </div>

                        <div class="fld">
                            <label for="">Contact no.</label>
                            <input type="text" name="mobile" id="training_name"
                                placeholder="Enter Contact Details" required>
                        </div>

                        <div class="fld">
                            <label for="">Email</label>
                            <input type="email" name="email" id="training_name"
                                placeholder="Enter Your Email" required>
                        </div>

                        <div class="fld">
                            <label for="">Username</label>
                            <input type="text" name="username" id="training_name"
                                placeholder="Enter Your Email" required>
                        </div>

                        <div class="fld">
                            <label for="">Password</label>
                            <input type="password" name="password" id="training_name"
                                placeholder="Enter Your Email" required>
                        </div>


                       

                        

                            <div class="fld">
                                <label for="">Role</label>
                                <select name="role_id">
                                    <option value="">Select Role</option>

                                    <?php

                                    $select_query = "SELECT * FROM role";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $role_name = $row['role_name'];
                                        $role_id = $row['role_id'];

                                        echo "<option value='$role_id'>$role_name</option>";

                                    }

                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="fld btn">
                            <input type="submit" value="Create Training" name="submit" id="submit">
                        </div>
                    </div>
                </form>

            </section>
        </div>

    </div>
      
    
</body>
</html>