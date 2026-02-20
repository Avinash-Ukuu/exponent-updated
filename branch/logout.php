<?php

include_once('configDB.php');

removeSession("logged_center_id");
removeSession("logged_cntrname");

session_destroy();

header('location: login.php');
