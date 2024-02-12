<?php
include('connect.php');


$training_id = isset($_GET['training_id']) ? (int)$_GET['training_id'] : null;


if ($training_id !== null) {
    $select_query =  "SELECT tp.name, tp.start_date, tp.end_date, tp.tr_desc, tr.department_id, d.department_name
    FROM create_training_programs tp 
    JOIN training_relations tr ON tp.training_program_id = tr.training_program_id
    JOIN department d ON tr.department_id = d.department_id
    WHERE tp.training_program_id = $training_id";
    $result_query = pg_query($conn, $select_query);

    if ($result_query && pg_num_rows($result_query) > 0) {
        $row = pg_fetch_assoc($result_query);
        $existing_name = $row['name'];
        $existing_start_date = $row['start_date'];
        $existing_end_date = $row['end_date'];
        $existing_tr_desc = $row['tr_desc'];
        $existing_department_name = $row['department_name'];
       
    } else {
        echo "Training not found.";
        exit();
    }
} else {
    echo "Training ID is missing.";
    exit();
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $tr_desc = $_POST['tr_desc'];
    $department_name = $_POST['department_name'];
    

    
    $update_query = "UPDATE create_training_programs AS tp 
                 SET
                    name = '$name',
                    start_date = '$start_date',
                    end_date = '$end_date',
                    tr_desc = '$tr_desc'
                 FROM training_relations AS tr
                 JOIN department AS d ON tr.department_id = d.department_id
                 WHERE 
                    tp.training_program_id = tr.training_program_id AND
                    tp.training_program_id = $training_id";

    $result_update = pg_query($conn, $update_query);

    if ($result_update !== false) {
        echo "<script>alert('Training records updated successfully');</script>";
        header("Location: manage_tr.php");
        exit();
    } else {
        echo "Error updating employee information: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/edit.css">
    <title>Edit Training</title>
</head>
<body>
    <?php require_once("navbar.html") ?>
    <div class="main_div">
        <div class="wrapper"></div>
        <section class="pst">
            <header>Edit Training</header>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="pdetail">
                    <div class="f">
                        <div class="fld fld1">
                            <label for="">Start Date</label>
                            <input type="text" name="start_date" id="first_name" placeholder="Enter Start Date" value="<?php echo $existing_start_date; ?>" required>
                        </div>
                        <div class="fld fld1">
                            <label for="">End Date</label>
                            <input type="text" name="end_date" id="last_name" placeholder="Enter Last Date" value="<?php echo $existing_end_date; ?>" required>
                        </div>
                    </div>
                    <div class="f">
                        <div class="fld">
                            <label for="">Department</label>
                            <input type="text" name="department_name" placeholder="Enter Department Name" value="<?php echo $existing_department_name; ?>" required>
                        </div>
                        <div class="fld">
                            <label for="">Training Description</label>
                            <input type="text" name="tr_desc" placeholder="Enter Training Name" value="<?php echo $existing_name; ?>" required>
                        </div>
                        
                    </div>
                     
                    <div class="f">
                        <div class="fld">
                            <label for="">Training Name</label>
                            <input type="text" name="name" id="email" placeholder="Training Description" value="<?php echo $existing_tr_desc; ?>" required>
                        </div>
                        
                    </div>

                   
                    <div class="fld btn">
                        <input type="submit" value="Edit Employee" name="submit" id="submit">
                    </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
