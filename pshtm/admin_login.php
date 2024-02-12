
<?php

session_start();

if(isset($_SESSION['admin_id'])) {

  header("location: dashboard.php");
  exit;  
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/admin_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Admin</title>
</head>
<body>

<div class="wrapper">
    <section class="login">
        <header>
            Access Admin Pannel 
        </header>
        <form action="" enctype="">
            <div class="error">
                
            </div>
            <div class="user-detail">
                
                <div class="field">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your Username">
                </div>
                <div class="field">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your Password">
                    <i class="fas fa-eye"></i>
                </div>
                

                <div class="field btn">
                    <input type="submit" value="Login as Admin" name="login_credentials_admin" id="">
                </div>

               
            </div>
        </form>
    </section>
</div>

<script src="admin_login.js"></script>  
</body>

</html>