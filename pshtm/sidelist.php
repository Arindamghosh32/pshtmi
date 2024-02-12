<?php
include('connect.php');

// Initialize variables
$existing_emp_first_name = '';
$existing_emp_last_name = '';
$existing_emp_department = '';
$existing_emp_job_post = '';
$existing_emp_email = '';
$existing_emp_phone = '';
$existing_emp_image = '';

// Check if employee_id is set in the URL
if (isset($_GET['employee_id'])) {
    $employee_id = (int)$_GET['employee_id'];

    // Fetch existing details from the database
    $select_query = "SELECT * FROM employee_records WHERE emp_id = $emp_id";
    $result_query = pg_query($conn, $select_query);

    if (!$result_query) {
        echo "Error: " . pg_error($conn);
    }

    if ($result_query && pg_num_rows($result_query) > 0) {
        $row = pg_fetch_assoc($result_query);

        // Assign values to variables
        $existing_emp_first_name = $row['emp_first_name'];
        $existing_emp_last_name = $row['emp_last_name'];
        $existing_emp_department = $row['emp_department'];
        $existing_emp_job_post = $row['emp_job_post'];
        $existing_emp_email = $row['emp_email'];
        $existing_emp_phone = $row['emp_phone'];
        $existing_emp_image = $row['emp_image'];
    } else {
        echo "Employee not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidelist.css">
    <title>Document</title>
</head>

<body>
    <div class="userlist">
        <div class="scrollbox">
            <div class="scrollboxdata">
                <?php
                $select_query = "SELECT * FROM employee_records";
                $result_query = pg_query($conn, $select_query);

                while ($row = pg_fetch_assoc($result_query)) {

                    $emp_id = $row['emp_id'];

                    $emp_first_name = $row['emp_first_name'];
                    $emp_last_name = $row['emp_last_name'];
                    $emp_department = $row['emp_department_name'];
                    $emp_job_post = $row['emp_job_post_name'];

                    $emp_email = $row['emp_email'];
                    $emp_phone = $row['emp_mobile'];

                    $emp_image = $row['emp_image'];

                    echo '
                    <div class="scard">
                        <div class="content">
                            <img src="db_img/' . $emp_image . '" alt="">
                            <div class="detail">
                                <span>' . $emp_first_name . ' ' . $emp_last_name . '</span>
                                <p>Dept: ' . $emp_department . ' job: ' . $emp_job_post . '</p>
                                <div class="bns">
                                    <a href="edit.php?emp_id=' . $emp_id . '">Edit</a>
                                    <a href="deactivate.php?emp_id=<?php echo $emp_id; ?>">Deactivate</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
        <div class="show1">
            <div class="show">
                <a href="employee_all.php">
                    show all
                </a>
            </div>
        </div>
    </div>
</body>

</html>
