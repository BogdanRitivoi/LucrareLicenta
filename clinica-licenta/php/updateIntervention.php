<?php
//	THIS IS USED update a intervention IN DB
session_start();
$fileId = $_SESSION['fileId'];
echo $fileId;

$intid = $_POST['vintid'];
$doctorname = $_POST['vdoctorname'];
$inttype = $_POST['vinttype'];
$intdiagnosis = $_POST['vintdiagnosis'];
$pretreatment = $_POST['vpretreatment'];
$posttreatment = $_POST['vposttreatment'];
$intdate = $_POST['vintdate'];
$indications = $_POST['vindications'];


$serverName = "DESKTOP-KQ42ELJ";
$connectionInfo = array( "Database"=>"clinica");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//check connection
if( $conn ) {
	echo "Connection established.<br />";
}

//write query
$sql = "UPDATE interventions SET doctorname='$doctorname', inttype='$inttype', intdiagnosis='$intdiagnosis', pretreatment='$pretreatment', posttreatment='$posttreatment', intdate='$intdate', indications='$indications' WHERE id = '$intid' AND fileid = '$fileId';";
$results = sqlsrv_query($conn, $sql);
sqlsrv_free_stmt( $results); 

//store activity
$sessionUserName = $_SESSION["lastname"].' '.$_SESSION['firstname'];
$dateActivity = date("Y-m-d h:i:sa");
$descriptionAct = "Interventia medicala cu id: " .$intid. " a fost modificata in baza de date.";
$entity = "Interventie medicala";
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