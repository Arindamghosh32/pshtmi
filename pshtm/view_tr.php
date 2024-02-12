<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/view_tr.css">
    <title>Training</title>
</head>

<body>

    <?php require_once("navbar.html") ?>
    <?php require_once("sidebartr.html") ?>

    <?php
    if (isset($_GET['training_id'])) {

        $training_id = $_GET['training_id'];

        // Select data from create_training_programs and join with training_relations and department
        $sql = pg_query($conn, "SELECT tp.name, tp.start_date, tp.end_date, tp.tr_desc, tr.department_id, d.department_name
                                FROM create_training_programs tp 
                                JOIN training_relations tr ON tp.training_program_id = tr.training_program_id
                                JOIN department d ON tr.department_id = d.department_id
                                WHERE tp.training_program_id = $training_id");
        if (pg_num_rows($sql) > 0) {
            $row = pg_fetch_assoc($sql);
        }
    }
    ?>
    <div class="container">
        <div class="wrapper" id="">
            <section class="pst">
                <header>
                    <h1>
                        <?php echo $row['name']; ?>
                    </h1>
                </header>


                <div class="pdetail">

                    <div class="fld">
                        <h2>Detail:
                            <?php echo $row['tr_desc']; ?>
                        </h2>
                    </div>

                    <div class="f">
                        <div class="fld">
                            <h3>Start Date:
                                <?php echo $row['start_date']; ?>
                            </h3>
                        </div>

                        <div class="f">
                        <div class="fld">
                            <h3>End Date:
                                <?php echo $row['end_date']; ?>
                            </h3>
                        </div>

                        <div class="fld">
                            <h3>Department:
                                <?php echo $row['department_name']; ?> 
                            </h3>
                        </div>

                    </div>
                    <?php
                    if (isset($_GET['training_id'])) {

                        $training_id = $_GET['training_id'];

                        $sql = pg_query($conn, "SELECT * FROM `preq` WHERE training_id=$training_id");
                        if (pg_num_rows($sql) > 0) {
                            $row1 = pg_fetch_assoc($sql);
                        }

                    }
                    ?>
                    <div class="f fl">

                        <?php $id_x = $row1['preq_id']; ?>

                        <div class="fld"><a href="view_preform.php?preq_id=<?php echo $id_x; ?>">
                                <div class="xx">
                                    <h4>Pre Questionnaire:</h4>
                                    <?php echo $row1['question_title']; ?>
                                </div>
                            </a>

                        </div>
                        <?php
                        if (isset($_GET['training_id'])) {

                            $training_id = $_GET['training_id'];

                            $sql = pg_query($conn, "SELECT * FROM `postq` WHERE training_id=$training_id");
                            if (pg_num_rows($sql) > 0) {
                                $row2 = pg_fetch_assoc($sql);
                            }
                        }
                        ?>
                        <div class="fld"><a href="">
                                <?php $id_y = $row2['postq_id']; ?>
                                <a href="view_preform.php?postq_id=<?php echo $id_y; ?>">
                                    <div class="xx">
                                        <h4>Post Questionnaire:</h4>
                                        <?php echo $row2['question_title']; ?>
                                    </div>
                                </a>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>

    <script src="manage.js"></script>
</body>

</html>