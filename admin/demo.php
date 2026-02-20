<?php
include_once('configDB.php');
$franch_query_max = mysqli_query($conn, "SELECT MAX(id) as id FROM `franchises_centre`");
$ch = mysqli_fetch_array($franch_query_max);
if ($ch['id'] != 0) {
    $franch_query = mysqli_query($conn, "SELECT * FROM `franchises_centre` WHERE id='$ch[id]'");
    $fr_code = mysqli_fetch_array($franch_query);
    $f_code = $fr_code['c_code'] + 1;
} else {
    $f_code = '120000';
}
echo "<script>alert('$f_code')</script>";
