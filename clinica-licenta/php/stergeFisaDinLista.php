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

//delete check-ups for this pacient record
$sqlDel = "DELETE FROM checkup WHERE fileid = '$id';";
$resultsDel = sqlsrv_query($conn, $sqlDel);
sqlsrv_free_stmt( $resultsDel);

//delete interventions for this pacient record
$sqlDel2 = "DELETE FROM interventions WHERE fileid = '$id';";
$resultsDel2 = sqlsrv_query($conn, $sqlDel2);
sqlsrv_free_stmt( $resultsDel2);

//write query
$sql = "DELETE FROM patient_file WHERE id = '$id';";
$results = sqlsrv_query($conn, $sql);
if($results === false)  
{  
	echo "Error in query preparation/execution.\n";  
	die( print_r( sqlsrv_errors(), true));  
}
sqlsrv_free_stmt( $results);


//store activity
session_start();
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Fisa pacient cu id: " .$id. " a fost eliminata din baza de date.";
$entity = "Fisa pacient";
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
header("Location: http://localhost/clinica-licenta/listaFise.php");  
?>