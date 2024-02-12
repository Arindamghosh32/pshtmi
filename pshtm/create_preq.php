<?php

include('connect.php');


if (isset($_POST['submit'])) {

 

  



    $training_program_id = $_POST['training_program_id'];

    $gettrnm = "SELECT name FROM create_training_programs WHERE training_program_id =  $1";
    $result_query = pg_query_params($conn, $gettrnm,array($training_program_id));
   
    if(!$result_query){
        die("error in sql query:" . pg_last_error($conn));
    }


    $training_name = '';

    while ($row = pg_fetch_assoc($result_query)) {
        $training_name = $row['name'];
    }


    if ( $training_program_id == '' || $training_name == '' ) {
        echo "<script>
            alert('enter all fields')
            </script>";
        exit();
    } else {
       
        $insert = "INSERT INTO questions ( training_program_id ) VALUES ( '$training_program_id')";                           
        $result_query = pg_query($conn, $insert);
        if ($result_query) {

            echo "<script>
                alert('Question Paper Created successfully')
                </script>";

                $newlyGeneratedId = $conn->insert_id;
                header("Location: preform.php?preq_id=" . $newlyGeneratedId);
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
                    Create Pre Question 
                </header>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="pdetail">
                        

                        <div class="f">
                        <div class="fld">
                                <label for="">Training</label>
                                <select name="training_program_id">
                                    <option value="">Select Training</option>

                                    <?php

                                    $select_query = "SELECT * FROM create_training_programs";
                                    $result_query = pg_query($conn, $select_query);

                                    while ($row = pg_fetch_assoc($result_query)) {
                                        $training_program_id = $row['training_program_id'];
                                        $training_name = $row['name'];

                                        echo "<option value='$training_program_id'>$training_name</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                           
                        </div>
                        <div class="fld btn">
                            <input type="submit" value="Create Pre Question" name="submit" id="submit">
                        </div>
                    </div>
                </form>

            </section>
        </div>

    </div>

    <script src="manage.js"></script>
</body>

</html>