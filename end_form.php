<?php

include('connect.php');

if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $training_program_id = $_POST['training_program_id'];
    $attendance = $_POST['attendance'];

    
    if (empty($emp_id) || empty($training_program_id) || empty($attendance)) {
        echo "<script>alert('Please enter all fields');</script>";
        exit();
    } else {
        
        $insert_emp_training_history = "INSERT INTO emp_training_hostory (emp_id, training_program_id,attendance) VALUES ('$emp_id', '$training_program_id','$attendance')";
        $result_emp_training_history = pg_query($conn, $insert_emp_training_history);

        if (!$result_emp_training_history) {
            die("Error in emp_training_history query: " . pg_last_error($conn));
        }


       if($result_emp_training_history){
        echo "<script>alert('Training records inserted successfully')</script>";
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
    <link rel="stylesheet" href="style/uni_select_tag.css">

    



    <title>End Form</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebartr.html") ?>
    <?php

$unique_identifier = time();
?>


    <div class="container">

        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    End Form
                </header>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                       <div class="fld">
                            <label for="">Employee</label>
                            <select name="emp_id" id="emp_id_<?php echo $unique_identifier; ?>" multiple>
                                <option value="">Select Employee</option>

                                <?php

                                $select_query = "SELECT * FROM employee_records";
                                $result_query = pg_query($conn, $select_query);

                                while ($row = pg_fetch_assoc($result_query)) {
                                    $emp_first_name = $row['emp_first_name'];
                                    $emp_last_name = $row['emp_last_name'];
                                    $emp_id = $row['emp_id'];

                                    echo "<option value='$emp_id'> $emp_first_name $emp_last_name</option>";
                                }

                                ?>
                            </select>
                        </div>



                        <div class="fld">
                            <label for="">Attendance</label>
                            <input type="number" name="attendance" id="training_name" placeholder="Enter Attendance Details" required>
                        </div>

                        

                        <div class="fld">
                            <label for="">Training</label>
                            <select name="training_program_id" id="department_id" multiple>
                                <option value="">Select Training</option>

                                <?php

                                $select_query = "SELECT * FROM create_training_programs";
                                $result_query = pg_query($conn, $select_query);

                                while ($row = pg_fetch_assoc($result_query)) {
                                    $name = $row['name'];
                                    $training_program_id = $row['training_program_id'];

                                    echo "<option value='$training_program_id'> $name</option>";
                                }

                                ?>
                            </select>
                        </div>

                        


                        <div class="f">
                            <div class="fld">

                            </div>



                        </div>



                        <!-- write start and end date -->


                        

                        <div class="fld btn">
                            <input type="submit" value="Create Training" name="submit" id="submit">
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
    <script src="style/uni_select_tag.js"></script>
    <script>
        new MultiSelectTag('department_id')
        new MultiSelectTag('emp_id_<?php echo $unique_identifier; ?>')
    </script>
    <script src="manage.js"></script>
</body>

</html>
