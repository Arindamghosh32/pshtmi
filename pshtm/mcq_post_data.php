<?php
include('connect.php');

    $mcqer = $_POST['mcqer'];
    $input_type = $_POST['input_type'];

    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];    

    $postq_id = $_POST['postq_id'];

    $insert = pg_query($conn, "INSERT INTO `postq_data` (postq_id, question, input_type, opt1, opt2, opt3, opt4) VALUES ('$postq_id', '$mcqer', '$input_type', '$opt1', '$opt2', '$opt3', '$opt4')");

?>