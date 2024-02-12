<?php
include('connect.php');

    $mcqer = $_POST['mcqer'];
    $input_type = $_POST['input_type'];

    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];    

    $preq_id = $_POST['preq_id'];

    $insert = pg_query($conn, "INSERT INTO `preq_data` (preq_id, question, input_type, opt1, opt2, opt3, opt4) VALUES ('$preq_id', '$mcqer', '$input_type', '$opt1', '$opt2', '$opt3', '$opt4')");

?>