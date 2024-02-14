<?php

include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/manage_job.css">
    <title>Department</title>
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php require_once("sidebar.html") ?>
    <div class="container">


        <table>
            <thead>
                <tr>
                    <th class="ly">Job Post</th>
                    <th class="ly">Department</th>
                    <th>Update</th>
                    <th>Delete</th>

                </tr>
            </thead>

            <?php

            $select_query = "SELECT
                             jp.job_post_name,
                             d.department_name
                             FROM job_post jp
                                JOIN training_relations tr ON jp.job_post_id = tr.job_post_id
                                  JOIN department d ON tr.department_id = d.department_id
                                    ";
            $result_query = pg_query($conn, $select_query);


            while ($row = pg_fetch_assoc($result_query)) {

                $emp_dept = $row['department_name'];
                $emp_job_post = $row['job_post_name'];

                echo "
                <tbody>
                    <tr>
                        <td class='ly'><p>$emp_job_post</p></td>
                        <td class='ly'><p>$emp_dept</p></td>
                        <td>
                            <a href=''>
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
