<?php

include_once('configDB.php');
$logged_center_id = "";
$logged_cntrname = "";
if (getSession('branch_id') > 0) {
    $logged_center_id  = getSession('branch_id');
    $logged_cntrname = getSession('branch_username');
} else {
    header("location: login.php");
}
//echo "<script>alert($logged_center_id)</script>";
