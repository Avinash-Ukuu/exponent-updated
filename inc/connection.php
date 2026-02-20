<?php date_default_timezone_set("Asia/Kolkata");

    session_start();

    error_reporting(0);



	require_once('libs/class.validations.php');

    require_once('libs/string_func.php');





	// $servername = "localhost";
	// $username = "galaxy_technoedu";
	// $password = "z(y4]2*tpxT}";
	// $dbname = "galaxy_eduportal";


	// $username = "boost5r9_depedu";
	// $password = "{Z&JB%4kl?xP";
	// $dbname = "boost5r9_dpedu";



// 	$servername = "localhost";

// 	$username = "root";

// 	$password = "";

// 	$dbname = "galaxy_techno2";


//     $servername = "localhost";
// 	$username = "exponent_livedb";
// 	$password = "_Dy&AKzz@f9m";
// 	$dbname = "exponent_livedb";

$servername = "localhost";
	$username = "u448113253_expontinst";
	$password = "b@^8XSJ1X";
	$dbname = "u448113253_expontinst";


	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection

	if ($conn->connect_error) {

	    die("Connection failed: " . $conn->connect_error);

	} else{

		//echo "connection connect Successfully";

	}

?>