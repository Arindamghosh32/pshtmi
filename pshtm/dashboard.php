<?php
include('connect.php');
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location: admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b9323f08fd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/dashboard.css">

    <title>pshtm</title>
</head>

<body>
    <?php require_once("navbar.html") ?>


    <div class="container">
        <h3>Analytics</h3>
        <div class="one">
            <div class="block">
                <div class="bx1">
                    <i class="fa-solid fa-chart-column fa-xl"></i>
                    <div class="midl">
                        <div class="lftb">
                            <h2>Completion Rate</h2>
                            <h1>1,10,500</h1>
                        </div>
                        <div class="rghtb">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="perc">
                                <p>90%</p>
                            </div>
                        </div>
                    </div>

                </div>
                <small class="mutedtext">last 24 hours</small>
            </div>

            <div class="block">
                <div class="bx2">
                    <i class="fa-regular fa-eye fa-xl"></i>
                    <div class="midl">
                        <div class="lftb">
                            <h2>Performance</h2>
                            <h1>9,50,500</h1>
                        </div>
                        <div class="rghtb">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="perc">
                                <p>70%</p>
                            </div>
                        </div>
                    </div>

                </div>
                <small class="mutedtext">last 24 hours</small>
            </div>

            <div class="block">
                <div class="bx3">
                    <i class="fa-solid fa-rocket fa-xl"></i>
                    <div class="midl">
                        <div class="lftb">
                            <h2>Growth Rate</h2>
                            <h1>2,500</h1>
                        </div>
                        <div class="rghtb">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="perc">
                                <p>40%</p>
                            </div>
                        </div>
                    </div>

                </div>
                <small class="mutedtext">last 24 hours</small>
            </div>
        </div>

        <h3>Controls</h3>
        <div class="two">
            <div class="block1">
                <div class="bx3">

                    <h3>Employees</h3>

                    <div class="linkbtn">
                        <a href="employee_reg.php">
                            <i class="fa-regular fa-address-card"></i><br>
                            <button> Register a Employee </button>
                        </a>

                        <a href="employee_all.php">
                            <i class="fa-regular fa-pen-to-square"></i><br>
                            <button>Edit Employee Details</button>
                        </a>

                        <a href="employee_all.php">
                            <i class="fa-solid fa-trash-arrow-up"></i><br>
                            <button>Deactivate a Employee</button>
                        </a>

                    </div>

                </div>
            </div>
            <div class="block1">
                <div class="bx3">
                    <h3>Trainings</h3>

                    <div class="linkbtn">
                        
                          
                       <a href="create_training.php"><button>Create a Training</button></a>
                        </a>

                        <a href="">
                            <i class="fa-solid fa-right-from-bracket"></i><br>
                            <button>Enroll Employee</button>
                        </a>

                        <a href="">
                            <i class="fa-solid fa-layer-group"></i><br>
                            <button>Manage Categories</button>
                        </a>

                    </div>

                </div>
            </div>

        </div>

        <div class="two">
            <div class="block1">
                <div class="bx3">
                    <?php

                    $select_query = "SELECT * FROM demo ";
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



                </div>
            </div>

            <div class="block1">
                <div class="bx3">
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
                            type: 'line',
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

        <div class="top">
            <h3>Top Content</h3>
            <table>
                <thead>
                    <tr>
                        <th class="t1">Track Title</th>
                        <th>views</th>
                        <th>impressions</th>
                        <th>converstion rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>the post one</td>
                        <td>1,10,500</td>
                        <td>5,10,500</td>
                        <td>50%</td>
                    </tr>
                    <tr>
                        <td>topic two</td>
                        <td>3,10,500</td>
                        <td>9,10,500</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td>readers book</td>
                        <td>6,50,500</td>
                        <td>7,50,500</td>
                        <td>80%</td>
                    </tr>
                </tbody>
            </table>
            <a href="">Show all</a>
        </div>



    </div>


</body>

</html>