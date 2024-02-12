<?php
include('connect.php');

$searchTerm = $_POST['searchTerm'];



$output="";
$sql = pg_query($conn, "SELECT * FROM employee_records WHERE emp_first_name LIKE '%{$searchTerm}%' OR emp_last_name LIKE '%{$searchTerm}%' ");
if (pg_num_rows($sql) > 0) {

    while ($row = pg_fetch_assoc($sql)) {

        $emp_id = $row['emp_id'];

        $emp_first_name = $row['emp_first_name'];
        $emp_last_name = $row['emp_last_name'];
        $emp_department_name = $row['emp_department_name'];
        $emp_job_post_name = $row['emp_job_post_name'];

        $emp_email = $row['emp_email'];
        $emp_phone = $row['emp_mobile'];

        $emp_image = $row['emp_image'];


        $output .= '
                    <a href="">
        <div class="card-container">

            <img class="round" src="db_img/' . $emp_image . '" alt="user" />
            <h3>' . $emp_first_name . ' ' . $emp_last_name . '</h3>
            <h6>Department: ' . $emp_department_name . '</h6>
            <h6>Job post: ' . $emp_job_post_name . '</h6>
            <p>' . $emp_email . ' ' . $emp_phone . '</p>
            <div class="buttons">

                <button class="primary">
                    Edit Details
                </button>
                <button class="primary ghost">
                    Deactivate
                </button>
            </div>
            <div class="skills">
                <h6>Trainings</h6>
                <ul>
                    <li>UI / UX</li>
                    <li>Front End Development</li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>React</li>
                    <li>Node</li>
                </ul>
            </div>

        </div>

    </a>

        ';

    }

} else {
    $output .= '<div class="all"><a href=""><div class="card-container"><h3>No Employee Found</h3></div></a></div>';
}
echo $output;

?>