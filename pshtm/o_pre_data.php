<?php
include('connect.php');

    $oneliner = $_POST['oneliner'];
    $input_type = $_POST['input_type'];

    $preq_id = $_POST['preq_id'];

    $insert = pg_query($conn, "INSERT INTO `preq_data` (preq_id, question, input_type) VALUES ('$preq_id', '$oneliner', '$input_type')");

?>