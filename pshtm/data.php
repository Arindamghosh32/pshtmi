<?php


    while ($row = pg_fetch_assoc($sql)) {

        $employee_id = $row['employee_id'];

        $emp_first_name = $row['emp_first_name'];
        $emp_last_name = $row['emp_last_name'];
        $emp_department = $row['emp_department'];
        $emp_job_post = $row['emp_job_post'];

        $emp_email = $row['emp_email'];
        $emp_phone = $row['emp_phone'];

        $emp_image = $row['emp_image'];


        $output .= '
                    <a href="">
        <div class="card-container">

            <img class="round" src="db_img/' . $emp_image . '" alt="user" />
            <h3>' . $emp_first_name . ' ' . $emp_last_name . '</h3>
            <h6>Department: ' . $emp_department . '</h6>
            <h6>Job post: ' . $emp_job_post . '</h6>
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
        echo $output;
    }
?>