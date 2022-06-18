<?php
//	THIS IS USED update a checkup IN DB
session_start();
$fileId = $_SESSION['fileId'];
echo $fileId;

$ciud = $_POST['vcuid'];
$weight = $_POST['vweight'];
$conformation = $_POST['vconformation'];
$maintenance = $_POST['vmaintenance'];
$condition = $_POST['vcondition'];
$temperament = $_POST['vtemperament'];
$skin = $_POST['vskin'];
$apparentMembers = $_POST['vapparentMembers'];
$explorableCenters = $_POST['vexplorableCenters'];
$diagnosis = $_POST['vdiagnosis'];
$treatment = $_POST['vtreatment'];
$transfer = $_POST['vtransfer'];
$nextvisit = $_POST['vnextvisit'];
$observations = $_POST['vobservations'];


$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "UPDATE checkup SET weight='$weight', conformation='$conformation', maintenance='$maintenance', condition='$condition', temperament='$temperament', skin='$skin', apparentMembers='$apparentMembers', explorableCenters='$explorableCenters', diagnosis='$diagnosis', treatment='$treatment', transfer='$transfer', nextvisit='$nextvisit', observations='$observations'  WHERE id = '$ciud' AND fileid = '$fileId';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results); 

//store activity
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Controlul medical cu id: " .$ciud. " a fost modificat in baza de date.";
$entity = "Control medical";
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
header("Location: http://localhost/clinica-licenta/vizualizareFisa.php".'?id='.$fileId);

?>