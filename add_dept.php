<?php

include('connect.php');


if (isset($_POST['submit'])) {

    $department_name = $_POST['department_name'];
    $department_id = $_POST['department_id'];


    if ($department_name == '' || $department_id == '') {
        echo "<script>
            alert('enter all fields')
            </script>";
        exit();
    } else {

      

        $insert_dept = "INSERT INTO department (department_id,department_name) VALUES ('$department_id', '$department_name')RETURNING department_id";

        $result_query = pg_query($conn, $insert_dept);
        if(!$result_query){
            die("There is an error" . pg_last_error($conn));
        }

        $insert_dept1 = "INSERT INTO training_relations(department_id) VALUES ('$department_id')";
        $result_query1 = pg_query($conn,$insert_dept1);
        if ($result_query && $result_query1) {

            echo "<script>
                alert('New Department Added successfully')
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
                    Add New Department
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">


                        <div class="">

                        <div class="fld">
                                <label for="">Department Id</label>
                                <input type="text" name="department_id" id="dept_name long" placeholder="enter dept name"
                                    required><br>

                            <div class="fld">
                                <label for="">Department Name</label>
                                <input type="text" name="department_name" id="dept_name long" placeholder="enter dept name"
                                    required>

                            </div>
                          
                        </div>

                        <div class="fld btn">
                            <input type="submit" value="Add Department" name="submit" id="submit">
                        </div>
                    </div>
                </form>

            </section>
        </div>

    </div>

    <script src="manage.js"></script>
</body>

</html>
