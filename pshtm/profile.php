<?php

include('connect.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/profile.css">
    <link rel="stylesheet" href="fonts/remixicon.css">
</head>

<body>
    <span class="main_bg"></span>
    <div class="container">
        <header>
            <?php


            if (isset($_GET['emp_id'])) {

                $emp_id = $_GET['emp_id'];
                $sql = pg_query($conn, "SELECT * FROM employee_records WHERE emp_id = $emp_id");
                if (pg_num_rows($sql) > 0) {
                    $row = pg_fetch_assoc($sql);
                }
            }
            ?>
            <div class="brandLogo">
                <figure>
                    <p>Employee</p>
                </figure>
                <span>User Settings</span>
                <a href="employee_all.php">Back</a>

            </div>
        </header>



        <section class="userProfile card">
            <div class="profile">
                <figure><img src="img/<?php echo $row['emp_image']; ?>" alt="profile" width="250px" height="250px">
                </figure>
            </div>
        </section>


        <section class="work_skills card">


            <div class="work">
                <h1 class="heading">Contact Details</h1>
                <div class="primary">
                    <h1>Email Address</h1>
                    <span><?php echo $row['emp_status']; ?></span>
                    <p>
                        <?php echo $row['emp_email']; ?>
                    </p>
                </div>

                <div class="secondary">
                    <h1>Phone No.</h1>
                    <span><?php echo $row['emp_status']; ?></span>
                    <p>
                        <?php echo $row['emp_mobile']; ?>
                    </p>
                </div>
            </div>


            <div class="skills">
                <h1 class="heading">Current Trainings</h1>
                <ul>
                    <li><a href="#1">Training one</a></li>
                    <li><a href="#2">other training</a></li>
                    <li><a href="#3">xyz training</a></li>

                    <li><a href="#4">abc training</a></li>
                    <li><a href="#5">health training</a></li>
                </ul>
            </div>
        </section>



        <section class="userDetails card">
            <div class="userName">
                <h1 class='name'>
                    <?php echo $row['emp_first_name'] . " " . $row['emp_last_name'] ?>
                </h1>

                <div class="map">
                    <i class="ri-map-pin-fill ri"></i>
                    <span></span>
                </div>
                <p><?php echo $row['emp_status']; ?> user</p>
            </div>

            <div class="rank">
                <div class="one">
                    <h1 class="heading">Department</h1>
                    <span>Dept Name</span>
                </div>
                <div class="two">
                    <h1 class="heading">Job Post</h1>
                    <span>Position of resp</span>
                </div>
            </div>

            <div class="btns">
                <ul>

                    <li class="sendMsg active">

                        <a href="#">Edit details</a>
                    </li>
                    <li class="sendMsg active">

                        <a href="deactivate.php?emp_id=<?php echo $row['emp_id'] ?>">Deactivate</a>
                    </li>


                </ul>
            </div>
        </section>

        <section class="timeline_about card">


            <div class="contact_Info" id="space">

                <div class="oneinfo" id="1">
                    <h1>Training Title</h1>
                    <p>Report and Analytics</p>

                    <div class="bnx">
                        <div class="inbx">
                            <?php

                            $select_query = "SELECT * FROM `demo`";
                            $result_query = pg_query($conn, $select_query);

                            $num = array();
                            $word = array();
                            while ($row = pg_fetch_assoc($result_query)) {
                                $num[] = $row["num"];
                                $word[] = $row["word"];
                            }

                            ?>
                            <div class="chartbox">
                                <canvas id="mychart"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <script>


                                const num = <?php echo json_encode($num); ?>;
                                const word = <?php echo json_encode($word); ?>;


                                const data = {
                                    labels: word,
                                    datasets: [{
                                        label: '# of Performance',
                                        data: num,
                                        borderWidth: 1
                                    }]
                                };

                                const confi = {
                                    type: 'bar',
                                    data,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };




                                const mychart = new Chart(
                                    document.getElementById('mychart'),
                                    confi
                                );

                            </script>

                            <h1 class="heading">Performance: Excellent</h1><br>

                            <h1 class="heading">Growth rate: 12%</h1><br>

                            <h1 class="heading">Progress: +20 </h1><br>

                        </div>
                        <div class="inbx">
                            <?php

                            $select_query = "SELECT * FROM `demo`";
                            $result_query = pg_query($conn, $select_query);

                            $num2 = array();
                            $word2 = array();
                            while ($row = pg_fetch_assoc($result_query)) {
                                $num2[] = $row["num"];
                                $word2[] = $row["word"];
                            }

                            ?>
                            <div class="chartbox">
                                <canvas id="mychart2"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <script>


                                const num2 = <?php echo json_encode($num2); ?>;
                                const word2 = <?php echo json_encode($word2); ?>;


                                const data2 = {
                                    labels: word2,
                                    datasets: [{
                                        label: '# of Analytics',
                                        data: num2,
                                        borderWidth: 1
                                    }]
                                };

                                const confi2 = {
                                    type: 'doughnut',
                                    data,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };




                                const mychart2 = new Chart(
                                    document.getElementById('mychart2'),
                                    confi2
                                );

                            </script>


                        </div>
                    </div>

                </div>



                <div class="oneinfo" id="2">
                    two
                </div>
                <div class="oneinfo" id="3">
                    three
                </div>
                <div class="oneinfo" id="4">
                    four
                </div>
                <div class="oneinfo" id="5">
                    five
                </div>


            </div>
            <div id="x">
                <!-- <p>xxxxxxxx</p> -->
            </div>

        </section>
    </div>
    <script>


    </script>

</body>

</html>