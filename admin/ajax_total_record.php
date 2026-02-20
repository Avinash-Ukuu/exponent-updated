<?php
require_once('configDB.php');
$id = $_POST['id'];
$ss = $_POST['ss'];
$query = mysqli_query($conn, "SELECT * FROM `tb_admit_card` WHERE `course_id`='$id' && status=0 &&  session_end='$ss' ") or die(mysqli_error($conn));
$ok = mysqli_num_rows($query);
if ($ok > 0) {
    echo '<span class="text-primary">Total records found in this course= ' . $ok . '</span>';
} else {
    echo '<span class="text-danger">No record found</span>';
}
