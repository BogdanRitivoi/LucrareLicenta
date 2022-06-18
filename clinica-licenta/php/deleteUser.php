<?php
if (isset($_GET['id']))
	$id = (int)$_GET['id'];
else
	$id = 0;
echo $id;

$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}
//delete appointments for this user
$sqlDel = "DELETE FROM appointments WHERE userid = '$id';";
$resultsDel = sqlsrv_query($conn, $sqlDel);
sqlsrv_free_stmt( $resultsDel);

//write query
$sql = "DELETE FROM users WHERE id = '$id';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);

//store activity
session_start();
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Utilizatorul cu id: " .$id. " a fost eliminat din baza de date.";
$entity = "Utilizator";
$color = "danger";
$type = "Eliminare";

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