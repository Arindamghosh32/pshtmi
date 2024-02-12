<?php

include('connect.php');

if (isset($_POST['submit'])) {
    $training_program_id = $_POST['training_program_id'];
    $training_name = $_POST['name'];
   
    $tr_desc = $_POST['tr_desc'];
    $dept_id = $_POST['department_id'];
    $job_post_id = $_POST['job_post_id'];

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

   

    


 

   
    $status = "true";
    if ($training_program_id == '' || $training_name == '' || $tr_desc == '' ||  $dept_id == '' || $job_post_id == ''   || $start_date == '' || $end_date == '' || $status == '') {
        echo "<script>
            alert('enter all fields')
            </script>";
        exit();
    } else {

       $insert = "INSERT INTO create_training_programs (training_program_id, name, tr_desc, start_date, end_date, training_status) VALUES ('$training_program_id', '$training_name', '$tr_desc','$start_date', '$end_date', '$status')RETURNING training_program_id";
       $result_query = pg_query($conn, $insert);

        if (!$result_query) {
            die("Error in create_training_programs query: " . pg_last_error($conn));
        }


        // Retrieve the training_program_id after insertion
         $row = pg_fetch_assoc($result_query);
        $training_program_id = $row['training_program_id'];



       $insert1 = "INSERT INTO training_relations(training_program_id,department_id,job_post_id) VALUES ('$training_program_id','$dept_id','$job_post_id')";
         $result_query1 = pg_query($conn, $insert1);

         if (!$result_query1) {
            die("Error in training_relations query: " . pg_last_error($conn));
        }

        if ($result_query && $result_query1) {

            echo "<script>
                alert('New Training Created successfully')
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
    <title>create training</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebartr.html") ?>

    <div class="container">

        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    Create Training
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">
                    <div class="fld">
                            <label for="">Training Program Id</label>
                            <input type="text" name="training_program_id" id="training_program_id"
                                placeholder="Enter Training id" required>
                        </div>

                        <div class="fld">
                            <label for="">Training Title</label>
                            <input type="text" name="name" id="training_name"
                                placeholder="Enter Training Title" required>
                        </div>

                        <div class="fld">
                                <label for="">Training Description</label>
                                <textarea name="tr_desc" id="tr_desc" cols="30" rows="10"></textarea>

                            </div>

                            <div class="fld">
                                <label for="">Department</label>
                                <select name="department_id">
                                    <option value="">Select Department</option>

                                    <?php

                                    $select_query = "SELECT * FROM department";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $dept_name = $row['department_name'];
                                        $dept_id = $row['department_id'];

                                        echo "<option value='$dept_id'>$dept_id $dept_name</option>";

                                    }

                                    ?>
                                </select>
                            </div>


                            <div class="fld">
                                <label for="">Job Post</label>
                                <select name="job_post_id">
                                    <option value="">Select Department</option>

                                    <?php

                                    $select_query = "SELECT * FROM job_post";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $job_post_name = $row['job_post_name'];
                                        $job_post_id = $row['job_post_id'];

                                        echo "<option value='$job_post_id'> $job_post_name</option>";

                                    }

                                    ?>
                                </select>
                            </div>


                        <div class="f">
                            <div class="fld">
                               
                            </div>

                           
                            
                        </div>



                        <!-- write start and end date -->


                        <div class="f">
                            <div class="fld">
                                <label for="">Start Date</label>
                                <input type="date" name="start_date" id="start_date" placeholder="Enter No Of Days"
                                    required>
                            </div>

                            <div class="fld">
                                <label for="">End Date</label>
                                <input type="date" name="end_date" id="end_date" placeholder="Enter No Of Days"
                                    required>
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

    <script src="manage.js"></script>
</body>

</html>