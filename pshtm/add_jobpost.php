<?php

include('connect.php');


if (isset($_POST['submit'])) {

    $emp_dept_id = $_POST['department_id'];
    $emp_job_post = $_POST['job_post_name'];


   

    if ($emp_job_post == '' || $emp_dept_id == '') {
        echo "<script>
            alert('enter all fields')
            </script>";
        exit();
    } else {

        $insert = "INSERT INTO job_post (job_post_name) VALUES ('$emp_job_post')RETURNING job_post_id";
        $result_query = pg_query($conn, $insert);

        if(!$result_query){
            die("there is an error in insert query" . pg_last_error($conn));
        }
        
        $row = pg_fetch_assoc($result_query);
        $job_post_id = ['job_post_id'];


        $insert1 = "INSERT INTO training_relations(department_id) VALUES ('$emp_dept_id')";
        $result_query_1 = pg_query($conn, $insert1);
        
        if ($result_query && $result_query_1) {

            echo "<script>
                alert('Job post Added successfully')
                </script>";

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/manage_dept.css">
    <title>Manage_Dept</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebar.html") ?>



    <div class="container">

        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    Add New JobPost
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">


                        <div class="f">
                            <div class="fld">
                                <label for="">Job Role</label>
                                <input type="text" name="job_post_name" id="" placeholder="enter your role"
                                    required>

                            </div>
                            <div class="fld">
                                <label for="">Department</label>
                                <select name="department_id">
                                    <option value="">Select Department</option>

                                    <?php

                                    $select_query = "SELECT * FROM department";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $emp_department_name = $row['department_name'];
                                        $emp_department_id = $row['department_id'];

                                        echo "<option value='$emp_department_id'>$emp_department_name</option>";

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="fld btn">
                            <input type="submit" value="Add Job Post" name="submit" id="submit">
                        </div>
                    </div>
                </form>

            </section>
        </div>

    </div>

    <script src="manage.js"></script>
</body>

</html>