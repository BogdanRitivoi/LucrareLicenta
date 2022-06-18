<?php
//	THIS IS USED to update a user
$userId = $_POST['vuserId'];
$username = $_POST['vusername'];
$lastname = $_POST['vlastname'];
$firstname = $_POST['vfirstname'];
$roleAndId = $_POST['vrole'];
$arrR = explode("_", $roleAndId);
$roleid = $arrR[0];
$role = $arrR[1];
$phone = $_POST['vphone'];
$email = $_POST['vemail'];
$address = $_POST['vaddress'];

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "UPDATE users SET username='$username', lastname='$lastname', firstname='$firstname', role='$role', roleid='$roleid', phone='$phone', email='$email', address='$address' WHERE id = '$userId';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);

//store activity
session_start();
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Utilizatorul cu id: " .$userId. " a fost modificat in baza de date.";
$entity = "Utilizator";
$color = "primary";
$type = "Modificare";

$sqla = "INSERT INTO activities (username, description, entity, color, activitydate, type)
VALUES (?,?,?,?,?,?);";
$paramsa = array($sessionUserName, $descriptionAct, $entity, $color, $dateActivity, $type);  
$resulta = sqlsrv_query($conn,$sqla,$paramsa);
if($resulta === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt($resulta); 

sqlsrv_close( $conn); 
header("Location: http://localhost/clinica-licenta/setari.php");

?>