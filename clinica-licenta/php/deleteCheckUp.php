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

//write query
$sql = "DELETE FROM checkup WHERE id = '$id';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results);  

//get fileId
session_start();
$fileId = $_SESSION['fileId'];

//store activity
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Controlul medical cu id: " .$id. " a fost eliminat din baza de date.";
$entity = "Control medical";
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
header("Location: http://localhost/clinica-licenta/vizualizareFisa.php".'?id='.$fileId); 
?>