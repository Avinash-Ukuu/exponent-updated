<?php date_default_timezone_set("Asia/Kolkata");
    session_start();
    error_reporting(1);

	require_once('libs/class.validations.php');
    require_once('libs/string_func.php');
    
    $servername = "localhost";
	$username = "galaxy_technoedu";
	$password = "z(y4]2*tpxT}";
	$dbname = "galaxy_eduportal";

	// $servername = "localhost";
	// $username = "boost5r9_depedu";
	// $password = "{Z&JB%4kl?xP";
	// $dbname = "boost5r9_dpedu";

	//$servername = "localhost";
	//$username = "root";
	//$password = "";
	//$dbname = "dp_edu";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else{
		//echo "connection connect Successfully";
	}
?>