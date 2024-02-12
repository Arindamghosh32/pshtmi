
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="stylesheet" href="style/analytics.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
</head>

<body>
    <?php require_once("navbar.html") ?>
    <?php
include('connect.php');
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location: admin_login.php");
}
?>

    <div class="container">
        <h1>Training Analytics</h1>

        <div class="two">
            <div class="box1">
                <div class="bp3">
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



                </div>
            </div>
            <div class="box1">
                <div class="bp3">
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








        <div class="container">
        <h1>trai</h1>

        <div class="two">
            <div class="box1">
                <div class="bp3">
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



                </div>
            </div>
            <div class="box1">
                <div class="bp3">
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
    
</body>

</html>
