<?php

require_once('configDB.php');

$id = $_POST['id'];

$st_session = $_POST['sse'];

$en_session = $_POST['ese'];

$month = $_POST['month'];



$rsdate = substr($st_session, -2);

/* $rsdate = date('Y', strtotime($st_session)); */



$max_id = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(id) as id FROM `tb_student` WHERE `session_start`='$st_session' && `session_end`='$en_session' && `course_id`='$id'"));



$query1 = mysqli_query($conn, "SELECT * FROM `tb_student` WHERE `id`='$max_id[id]'");

$okk = mysqli_num_rows($query1);

$query = mysqli_query($conn, "SELECT * FROM `tb_course` WHERE `id`='$id'") or die(mysqli_error($conn));

$course = mysqli_fetch_array($query);

if ($okk != 0) {

    $data = mysqli_fetch_array($query1);

    $rn = $data['reg_no'] + 1;

    $reg_num = sprintf("%03s", $rn);

    $roll_num = sprintf("%03s", $rn);

    echo ("EI/$course[course_code]/$rsdate$month$reg_num") . '###' . $reg_num . '###' . $en_session . $month . $roll_num;
} else {

    $rn = '001';

    echo "EI/$course[course_code]/$rsdate$month$rn" . '###' . $rn . '###' . $en_session . $month . '001';
}
