<?php
//THIS IS USED TO GET INFORMATION FOR THE CURRENT FILE

session_start();

//check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("Location: http://localhost/clinica-licenta/login.php");
		exit;
}

if (isset($_GET['id'])){
	$id = (int)$_GET['id'];
	$_SESSION['fileId'] = $id;
}
else
	$id = 0;


//connect to database
$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false )  
{  
	echo "Could not connect.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

//write query for all users
$sql = "SELECT * FROM patient_file WHERE id = '$id';";
//make query and get results
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
} 

if( sqlsrv_fetch( $results ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
$id = sqlsrv_get_field($results, 0);
$lastname = sqlsrv_get_field($results, 1);
$firstname = sqlsrv_get_field($results, 2);
$ci = sqlsrv_get_field($results, 3);
$county = sqlsrv_get_field($results, 4);
$adress = sqlsrv_get_field($results, 5);
$phone = sqlsrv_get_field($results, 6);
$email = sqlsrv_get_field($results, 7);
$entryDate = sqlsrv_get_field($results, 8);
$entryDate = date_format($entryDate, "Y/m/d"); //date format
$patientName = sqlsrv_get_field($results, 9);
$species = sqlsrv_get_field($results, 10);
$breed = sqlsrv_get_field($results, 11);
$birthDate = sqlsrv_get_field($results, 12);
$birthDate = date_format($birthDate, "Y/m/d"); //date format
$chronic = sqlsrv_get_field($results, 13);
$conditions = sqlsrv_get_field($results, 14);
$comments = sqlsrv_get_field($results, 15);
$vaccine = sqlsrv_get_field($results, 16);
$extDeworm = sqlsrv_get_field($results, 17);
$intDeworm = sqlsrv_get_field($results, 18);
$neutred = sqlsrv_get_field($results, 19);
$sex = sqlsrv_get_field($results, 20);

/* Free statement and connection resources. */  
sqlsrv_free_stmt( $results);  
sqlsrv_close( $conn);

?>