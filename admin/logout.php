<?php

	include_once('configDB.php');

	removeSession("log_userid");
	removeSession("log_username");
	removeSession("log_usertype");
	session_destroy();

	header('location: login.php');

?>