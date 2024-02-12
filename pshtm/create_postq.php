<?php

include('connect.php');

if (isset($_POST['submit'])) {

    $question_title = $_POST['question_title'];

    $dept_id = $_POST['dept_id'];

    $getdptnm = "SELECT emp_department_name FROM emp_department WHERE emp_department_id =  $dept_id";
    $result_query = pg_query($conn, $getdptnm);

    while ($row = pg_fetch_assoc($result_query)) {
        $dept_name = $row['emp_department_name'];
    }

    $training_id = $_POST['training_id'];

    $gettrnm = "SELECT training_name FROM training WHERE training_id =  $training_id";
    $result_query = pg_query($conn, $gettrnm);

    while ($row = pg_fetch_assoc($result_query)) {
        $training_name = $row['training_name'];
    }


    if ($question_title == '' || $question_title == '' || $training_id == '' || $training_name == '' || $dept_id == '' || $dept_name == '' ) {
        echo "<script>
            alert('enter all fields')
            </script>";
        exit();
    } else {
       
        $insert = "INSERT INTO `postq` (question_title, training_id, training_name, dept_id, dept_name) VALUES ('$question_title', '$training_id', '$training_name', '$dept_id', '$dept_name')";

        $result_query = pg_query($conn, $insert);
        if ($result_query) {

            echo "<script>
                alert('Question Paper Created successfully')
                </script>";

                $newlyGeneratedId = $conn->insert_id;
                header("Location: postform.php?postq_id=" . $newlyGeneratedId);
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
    <title>Pre questionnaire</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebartr.html") ?>

    <div class="container">

        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    Create Post Question 
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">
                        <div class="fld">
                            <label for="">Question Paper Title</label>
                            <input type="text" name="question_title" id="question_title" placeholder="Enter Training Title" required>
                        </div>

                        <div class="f">
                        <div class="fld">
                                <label for="">Training</label>
                                <select name="training_id">
                                    <option value="">Select Training</option>

                                    <?php

                                    $select_query = "SELECT * FROM `training`";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $training_id = $row['training_id'];
                                        $training_name = $row['training_name'];

                                        echo "<option value='$training_id'>$training_name</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="fld">
                                <label for="">Department</label>
                                <select name="dept_id">
                                    <option value="">Select Department</option>

                                    <?php

                                    $select_query = "SELECT * FROM `emp_department`";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $dept_name = $row['emp_department_name'];
                                        $dept_id = $row['emp_department_id'];

                                        echo "<option value='$dept_id'>$dept_name</option>";

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="fld btn">
                            <input type="submit" value="Create Post Question" name="submit" id="submit">
                        </div>
                    </div>
                </form>

            </section>
        </div>

    </div>

    <script src="manage.js"></script>
</body>

</html>