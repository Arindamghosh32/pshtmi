<?php
include('connect.php');

    $multiliner = $_POST['multiliner'];
    $input_type = $_POST['input_type'];

    $postq_id = $_POST['postq_id'];

    $insert = pg_query($conn, "INSERT INTO `postq_data` (postq_id, question, input_type) VALUES ('$postq_id', '$multiliner', '$input_type')");

?>