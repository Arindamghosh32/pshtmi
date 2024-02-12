<?php
include('connect.php');

    $multiliner = $_POST['multiliner'];
    $input_type = $_POST['input_type'];

    $preq_id = $_POST['preq_id'];

    $insert = pg_query($conn, "INSERT INTO `preq_data` (preq_id, question, input_type) VALUES ('$preq_id', '$multiliner', '$input_type')");

?>