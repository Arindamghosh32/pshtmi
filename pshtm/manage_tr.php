<?php

include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/manage_tr.css">
    <title>Training</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebartr.html") ?>
    <div class="container">

        <table>
            <thead>
                <tr>
                    <th class="ly">Training</th>
                    <th class="ly">Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <?php

$select_query = "SELECT tp.name, tp.start_date, tp.end_date, tp.training_program_id, 
                   tr.department_id, d.department_name
                FROM create_training_programs tp 
                JOIN training_relations tr ON tp.training_program_id = tr.training_program_id
                JOIN department d ON tr.department_id = d.department_id";

            $result_query = pg_query($conn, $select_query);


            while ($row = pg_fetch_assoc($result_query)) {
                $training_name = $row['name'];
                $dept_name = $row['department_name'];
                
                $start_date = $row['start_date'];
                $end_date = $row['end_date'];
                $training_id = $row['training_program_id'];

                echo "
                <tbody>
                    <tr>
                        <td class='ly'>
                            <a href='view_tr.php?training_id=$training_id'>
                                <p>$training_name</p>
                            </a>
                        </td>
                        <td class='ly'><p>$dept_name</p></td>
                        <td class='ly'><p>$start_date</p></td>
                        <td class='ly'><p>$end_date</p></td>
                        <td>
                        <a href='training_edit.php?training_id=$training_id'>
                                <p class='p-g'>Update</p>
                            </a>
                        </td>
                        <td>
                            <a href=''>
                                <p class='l-r'>Delete</p>
                            </a>
                        </td>
                    </tr>

                </tbody>
            

        ";
            }




            ?>
        </table>

    </div>



    <script src="manage.js"></script>
</body>

</html>