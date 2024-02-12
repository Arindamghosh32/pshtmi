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

            $select_query = "SELECT * FROM `emp_job_post`";
            $result_query = pg_query($conn, $select_query);


            while ($row = pg_fetch_assoc($result_query)) {

                $emp_dept = $row['emp_dept'];
                $emp_job_post = $row['emp_job_post'];

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